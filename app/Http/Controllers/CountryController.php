<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use Inertia\Response;

use App\Payroll\User;

use App\Payroll\Country;

use App\Payroll\Company;

use App\Payroll\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\StoreCountryRequest;

use App\Http\Requests\UpdateCountryRequest;


class CountryController extends Controller
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
      try{

        

        $this->authorize('viewAny', Country::class);

        $company = $this->company();      

     
        Log::debug($company->name.': Start country index');

        $countries = Country::all();

        return view('countries.index', compact('countries'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End country index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Country::class);

        return view('countries.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->authorize('create', Country::class);

     

      //Validation
      $this->validate(request(),[

        'name' =>'required|string'

      ]);



      $country = new Country;

      $country_count = Company::where('country_id', $country->id)->count();

      $country->name = request('name');

      $country->description = request('description');

      $country->country_code = request('country_code');

      $country->currency_code = request('currency_code');

      $country->currency_name = request('currency_name');

      $country->capital = request('capital');

      $country->language_code = request('language_code');

      $country->language = request('language');

      $country->flag = request('flag');

      $country->map = request('map');

      $country->google_cordinate = request('google_cordinate');

      $country->company_count =   0;

      $country->system_users = request('system_users');

      $country->employees = request('employees');     

      $country->save();

     return back()->with('success','Country added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $this->authorize('view', $country);

        return view('countries.show',compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
      $this->authorize('update', $country);  
      return view('countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {

      $this->authorize('update', $country);

      //Validation
      $this->validate(request(),[

        'name' =>'required|string'

      ]);


    //save data
            $countryUpdate = Country::where('id', $country->id)

            ->update([

                'name'			=> $request->input('name'),

                'description'   => $request->input('description'),

                'flag'          => $request->input('flag'),

                'map'          => $request->input('map'),

                'currency_code' => $request->input('currency_code'),

                'currency_name'   => $request->input('currency_name'),

                'capital'       => $request->input('capital'),

                'language_code' => $request->input('language_code'),

                'language'       => $request->input('language'),

                'employees'      => $request->input('employees'),

                'system_users'  => $request->input('system_users'),

                'google_cordinate' => $request->input('google_cordinate'),

                'company_count'    => 0,

                'country_code'    => $request->input('country_code')                                                                               

            ]);

            if($countryUpdate)

              return redirect('countries')

              ->with('success','Country updated successfully');
              //redirect



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {

      $this->authorize('delete', $country);

      $country = Country::find($country->id);

      $country_exist = Company::where('country_id',$country->id)->exists();

        if (!$country_exist && $country->delete()){      

        return redirect('countries')

        ->with('success','Country deleted successfully');

      }else{

        return back()->withInput()->with('error','Country could not be deleted');

      }
    }
}
