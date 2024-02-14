<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Jobs\TenantWelcomeEmailJob;
use Inertia\Inertia;

use Inertia\Response;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $tenants = Tenant::all();

        
        $tenants = Tenant::query()
        
        ->join('domains', 'domains.tenant_id', 'tenants.id')       

        ->select(
            'tenants.*',
            'domains.id as domain_id',
            'domains.domain'
            )

        ->get();


        // dd($tenants);
       
        return Inertia::render('Tenants/Index',compact('tenants', 'translations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $tenants = Tenant::all();

        return Inertia::render('Tenants/Create', compact('translations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      

      
        $this->validate($request, [
            'id' => 'required|unique:tenants,id' ,
               
        ]);

        $id = strtolower($request->input('id'));   


        $tenant = Tenant::create(['id' => $id ]);

     

     
        $tenant->domains()->create(['domain' => $id .'.localhost']);       

        \Artisan::call('tenants:migrate', [
            '--tenants' => [$tenant['id']]
        ]);

        \Artisan::call('tenants:seed', [
            '--tenants' => [$tenant['id']]
        ]);


        // validate email address in ternants


       $email = $request->input('email');

       $company_name = $request->input('company_name');
       

        $tenant->run(function () use ($email, $company_name, $id) {

                       
            $company = Company::create([
                'name' =>  $company_name, 
                'country_id' => 1,
                'tenant_id' => $id,             
            ]);


            $user = User::create([
                'name' => 'admin', 
                'email' => $email,
                'company_id' => $company->id,
                'password' => bcrypt('admin')
            ]);

            $role = Role::create(['name' => 'Admin']);
   
            $permissions = Permission::pluck('id','id')->all();
      
            $role->syncPermissions($permissions);
       
            $user->assignRole([$role->id]);

            
        });   

        dispatch(new TenantWelcomeEmailJob($email, $tenant))->onConnection('central');



        // dispatch(new TenantWelcomeEmailJob($user, $tenant))->onConnection('central');


    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        // $tenant = Tenant::find($id);
        return Inertia::render('Tenants/Edit',compact('tenant', 'translations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        // $tenant = Tenant::find($id);
        
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        return Inertia::render('Tenants/Edit', compact('tenant','translations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
