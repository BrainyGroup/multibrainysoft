<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\TenantDetail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Jobs\TenantWelcomeEmailJob;
use Illuminate\Support\Str;
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
        ->join('tenant_details', 'tenant_details.tenant_id', 'tenants.id')      

        ->select(
            'tenants.*',
            'domains.id as domain_id',
            'domains.domain',
            'tenant_details.email',
            'tenant_details.mobile',
            'tenant_details.first_name',
            'tenant_details.last_name'
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
        
        // dd('test');
        
        // dd($request);

      
        // $this->validate($request, [
        //     'id' => 'required|unique:tenants,id' ,
        //     'email' => 'required|email',
        //     'name' => 'required',
        //     'mobile' => 'required',                         
        // ]);

        $id = strtolower($request->input('id'));
        
               // validate email address in ternants
          

        $app_domain = env('APP_DOMAIN', 'brainysoft.co.tz');


       $email = $request->input('email');

       $first_name = $request->input('first_name');

       $mobile = $request->input('mobile');

       $company_name = $request->input('company_name');


        $tenant = Tenant::create(['id' => $id ]);

        // dd($tenant);

       

        $tenant->domains()->create(['domain' => $id . '.' . $app_domain]); 

        

        $tenant_detail = TenantDetail::create([
            'tenant_id' => $id,
            'uuid' => (string) Str::uuid(),
            'domain' => $id .'.'. $app_domain,
            'name' => $company_name,
            'description' => $request->input('description'),
            'email' => $email,
            'mobile' => $mobile,
            'database' => config('tenancy.database.prefix') . $id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
        ]);
        
        


        // \Artisan::call('tenants:migrate', [
        //     '--tenants' => [$tenant['id']]
        // ]);

        \Artisan::call('tenants:seed', [
            '--tenants' => [$tenant['id']]
        ]);


 
       

        $tenant->run(function () use ($email, $company_name, $first_name, $id) {

                       
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

            // $role = Role::create(['name' => 'Admin']);

            $role = Role::where('name', 'Admin')->first();
   
            // $permissions = Permission::pluck('id','id')->all();
      
            // $role->syncPermissions($permissions);
       
            $user->assignRole([$role->id]);

            
        });   

        dispatch(new TenantWelcomeEmailJob($email, $tenant, $tenant_detail))->onConnection('central');



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
