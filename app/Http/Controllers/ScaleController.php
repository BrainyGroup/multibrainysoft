<?php

namespace App\Http\Controllers;


use Exception;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\User;

use App\Models\Scale;

use App\Models\Country;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Employment_type;

use App\Models\Payroll_group;

use App\Models\Pay_base;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreScaleRequest;

use App\Http\Requests\UpdateScaleRequest;

use Carbon\Carbon;



class ScaleController extends Controller
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
    public function index(Request $request)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('viewAny', Scale::class);
        // Log::info($this->company->name.': Start scale index');

        return Inertia::render('Scales/Index',  [
          'translations' => $translations,
          'filters' => Req::all('search', 'trashed'),
          'can' => ['create_scale' => $request->user()->can('create', Scale::class)],
          'scales' => Scale::query()           
            ->where('company_id', $this->company()->id)
              ->orderByName()
              ->filter(Req::only('search', 'trashed'))
              ->paginate(10)
              ->withQueryString()
              ->through(fn ($scale) => [
                  'id' => $scale->id,  
                  'name' => $scale->name, 
                  'description' => $scale->description,                                     
                  'minimum' => $scale->minimum,
                  'maximum' => $scale->maximum, 
                  'employment_type_name' => $scale->employment_type->name,
                  'payroll_group_name' => $scale->payroll_group->name,
                  'pay_base_name' => $scale->pay_base->name,
              ]),
         ]);     

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End scale index');

        $errorTime = Carbon::now();

        return redirect()->back()

        ->with('error', $e->getMessage());

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{ 

          $locale = app()->getLocale();
  
          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
            
          $this->authorize('create', Scale::class);          
          
          $employment_types = Employment_type::where('company_id', $this->company()->id)->get();

          $payroll_groups = Payroll_group::where('company_id', $this->company()->id)->get();

          $pay_bases = Pay_base::where('company_id', $this->company()->id)->get();
       

          return Inertia::render('Scales/Create', compact('employment_types', 'payroll_groups', 'pay_bases', 'translations'));
  
        }catch(Exception $e){
  
          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
  
          $errorTime = Carbon::now();        
  
          return redirect()->back()
  
          ->with('error', $e->getMessage());
  
        }     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScaleRequest $request)
    {
      // TODO: check more on validatition
     try{

      // Log::info($this->company()->name.': Start scale store');

      $locale = app()->getLocale();

      $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

      $this->authorize('create', Scale::class);  

      $request['created_by'] =  auth()->user()->id;

      $request['country_id'] =  $this->company()->country_id;          

      $request['company_id'] = $this->company()->id;    

      $scale= Scale::create($request->all());    

      Log::debug($this->company()->name .' : '.'item created successful');

      // Log::info($this->company()->name.': End scale store');

      return redirect()->route('scales.index')

      ->with('success', $translations['item created succssfully']);
      
    }catch(Exception $e){

      Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

      $errorTime = Carbon::now();;

      // Log::info($this->company()->name.': End scale store');

      return redirect()->back()

      ->with('error', $e->getMessage());

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scale  $scale
     * @return \Illuminate\Http\Response
     */
    public function show(Scale $scale)
    {

        try{

          $locale = app()->getLocale();
  
          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('view', $scale);

          $countries = Country::all();

          $current_country = Country::find($scale->country_id);

  
            return Inertia::render('Scales/Show',compact('scale'));
  
          }catch(Exception $e){
  
            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
  
            $errorTime = Carbon::now();        
  
            return redirect()->back()
  
            ->with('error', $e->getMessage());
  
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scale  $scale
     * @return \Illuminate\Http\Response
     */
    public function edit(Scale $scale)
    {
       try{

          $locale = app()->getLocale();
  
          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
      
          $this->authorize('update', $scale);

          $employment_types = Employment_type::where('company_id', $this->company()->id)->get();

          $payroll_groups = Payroll_group::where('company_id', $this->company()->id)->get();

          $pay_bases = Pay_base::where('company_id', $this->company()->id)->get();



            return Inertia::render('Scales/Edit',compact('scale','employment_types','payroll_groups','pay_bases', 'translations'));
  
          }catch(Exception $e){
  
            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
  
            $errorTime = Carbon::now();        
  
            return redirect()->back()
  
            ->with('error', $e->getMessage());
  
          }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scale  $scale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScaleRequest $request, Scale $scale)
    {
      // Log::info($this->company()->name.': Start scale update');

      try{

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $scale);

        $request['updated_by'] =  auth()->user()->id;

        $scale->update($request->all());

        // Log::info($this->company()->name.': End scale store');

        return redirect()->route('scales.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End scale update');

        return redirect()->back()

        ->with('error', $e->getMessage());
      }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scale  $scale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scale $scale)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $scale);

        if ($scale->delete()){
          
          return redirect()->route('scales.index')
  
          ->with('success', $translations['item deleted successfully']);

      }

    }catch(Exception $e){

      Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

      $errorTime = Carbon::now();        

      return redirect()->back()

      ->with('error', $e->getMessage());

      }
    
    }
}
