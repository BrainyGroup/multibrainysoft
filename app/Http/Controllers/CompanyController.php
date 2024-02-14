<?php

namespace App\Http\Controllers;


use Exception;

use Inertia\Inertia;

use Inertia\Response;

use Illuminate\Support\Facades\Storage;

use App\ImageModel;

use Image;

use App\Models\User;

use App\Models\Country;

use App\Models\Company;

use App\Models\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreCompanyRequest;

use App\Http\Requests\UpdateCompanyRequest;

use Carbon\Carbon;


class CompanyController extends Controller
{
    public function __construct()
    {
    }

    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // try{

      //   $company = $this->company();

              //TODO identify tenant and put it in log and audit trail
      //TODO refactor and use event for log and audit trail
     try{    

      $locale = app()->getLocale();

      $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

      $this->authorize('create', Company::class);      
      // Log::info($this->company()->name.': Start company index');

      return Inertia::render('Companies/Index',  [
        'translations' => $translations,
        'filters' => Req::all('search', 'trashed'),
        'can' => ['create_company' => $request->user()->can('create', Company::class)],
        'companies' => Company::query()->where('country_id', $this->company()->country_id)
            ->orderByName()
            ->filter(Req::only('search', 'trashed'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($company) => [
                'id' => $company->id,
                'tenant_id' => $company->tenant_id,
                'name' => $company->name,
                'country_id' => $company->country_id,                 
                'deleted_at' => $company->deleted_at,
            ]),
       ]);        

    }catch(Exception $e){

      Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

      // Log::info($this->company()->name.': End company index');

      $errorTime = Carbon::now();

      return redirect()->back()

      ->with('error', $e->getMessage());
    }


      // }catch(Exception $e){

      //   $company = $this->company();

      //   Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

      //   Log::debug($company->name.': End company index');
      // }




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $locale = app()->getLocale();

      $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

      $this->authorize('create', Company::class);


      $countries = Country::all();

      // return view('companies.create', compact('countries'));

      return Inertia::render('Companies/Create', compact('countries','translations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->authorize('create', Company::class);



      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      //get user id

      //$company = $this->company();

      $company = new Company;

      $dt = now();

      $company->name = request('name');

      $company->description = request('description');

      $company->logo = request('logo');

      $company->website = request('website');

      $company->tin = request('tin');

      $company->vrn = request('vrn');

      $company->regno = request('regno');

      $company->slogan = request('slogan');

      $company->mission = request('mission');

      $company->vision = request('vision');

      $company->usage_count  = 0;

      $company->trial_expire_date = now()->addMonth(3);

      $company->last_renew_date  = $dt->toDateString();

      // dd($company->last_renew_date);

      $company->employees = request('employees');

      $company->balance  = 0;

      $company->expire_date  = now()->addMonth(3);

      $company->trial  = true;

      $company->country_id = request('country_id');

      $company->save();

      return back()->with('success','Company added successfully');

      // TODO seed initial data with company it, consider languaage add those which not related to the country
      // any country related add when you add country



      /*
      / it is batter to put these information on table based on country for easy update
      / Allowance types
      / banks
      / companys
      / deduction type
      / department
      / designation
      /  statutory base and option and mandatory based on country
      / Kin type consider langauge
      / organization based on country 
      / when you define country define with all item related to the country 
      / paye, organization banks, statutory options and mandatory
      */
      

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
      $this->authorize('view', $company);  
      return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
       $this->authorize('update', $company);

       $countries = Country::all();

        $current_country = Country::find($company->country_id);

        return view('companies.edit', compact('company','countries','current_country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
      //Validation
      $this->authorize('update', $company);

      $validation  = $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

        'logo' => 'file|image|mimes:jpeg,png,gif,webp|nullable|max:1999',

      ]);

       $filename = null;


       // $filename = $img = Image::canvas(100, 115, '#ccc');

      if($request->hasFile('logo')) {

           $file      = $validation['logo']; // get the validated file

           $extension = $file->getClientOriginalExtension();

           $filename  = strtolower($company->id . '.' . $extension);     

           $exists = Storage::disk('local')->exists('company_logo' . $company->logo);



           if( (strtolower($company->logo) != strtolower($filename)) && $exists ){


            Storage::delete('company_logo' . $user->logo);
            

            Image::make($validation['logo'])->resize(100, 115)->save(
               'storage/company_logo/'.$filename);

            // $path      = $file->storeAs('public/user_profile_photos', $filename);       

            }else{

         Image::make($validation['logo'])->resize(100, 115)->save(
                'storage/company_logo/'.$filename);

             // $path      = $file->storeAs('public/user_profile_photos', $filename);

            }
        }

      $companyUpdate = Company::where('id', $company->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

          'logo'			=>$request->input('website'),

          'website'	=>$request->input('logo'),

          'country_id'	=>$request->input('country_id'),

          'tin'			=>$request->input('tin'),

          'vrn'	=>$request->input('vrn'),

          'regno'			=>$request->input('regno'),

          'slogan'	=>$request->input('slogan'),

          'mission'			=>$request->input('mission'),

          'vision'	=>$request->input('vision'),

          'usage_count'  =>$request->input('0'),

          'trial_expire_date'  => now()->addMonth(3),

          'last_renew_date'  => now(),

          'employees'  =>$request->input('employees'),

          'balance'  => 0,

          'expire_date'  => now()->addMonth(3),

          'trial'  => true,

      ]);

      if($companyUpdate)

        return redirect('companies')

        ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {


      $this->authorize('delete', $company);

      $company = Company::find($company->id);




      $company_exist = User::where('company_id',$company->id)->exists();

        if (!$company_exist && $company->delete()){

        return redirect('companies')

        ->with('success','Company deleted successfully');

      }else{

        return back()->withInput()->with('error','Company could not be deleted');

      }
    }
}
