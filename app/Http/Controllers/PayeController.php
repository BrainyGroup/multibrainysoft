<?php

namespace App\Http\Controllers;


use Exception;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\User;

use App\Models\Paye;

use App\Models\Country;

use App\Models\Company;

use App\Models\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StorePayeRequest;

use App\Http\Requests\UpdatePayeRequest;

use Carbon\Carbon;



class PayeController extends Controller
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

        $this->authorize('viewAny', Paye::class);
        // Log::info($this->company->name.': Start paye index');

        // TODO: figure out how to find country of the user


        return Inertia::render('Payes/Index',  [
          'translations' => $translations,
          'filters' => Req::all('search', 'trashed'),
          'can' => ['create_paye' => $request->user()->can('create', Paye::class)],
          'payes' => Paye::query()           
            ->where('country_id', $this->company()->country_id)
              ->orderByMinimum()
              ->filter(Req::only('search', 'trashed'))
              ->paginate(10)
              ->withQueryString()
              ->through(fn ($paye) => [
                  'id' => $paye->id,  
                  'country_name' => $paye->country->name,                  
                  'minimum' => $paye->minimum,
                  'maximum' => $paye->maximum, 
                  'ratio' => $paye->ratio,
                  'offset' => $paye->offset,
              ]),
         ]);     

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End paye index');

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
            
          $this->authorize('create', Paye::class);
          
          $countries = Country::all();      

          
          return Inertia::render('Payes/Create', compact('countries','translations'));
  
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
    public function store(StorePayeRequest $request)
    {
      // TODO: check more on validatition
     try{

      // Log::info($this->company()->name.': Start paye store');

      $locale = app()->getLocale();

      $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

      $this->authorize('create', Employee::class);

      $request['created_by'] =  auth()->user()->id;

      $request['country_id'] =  $this->company()->country_id;          

      $request['company_id'] = $this->company()->id;    

      $paye= Paye::create($request->all());    

      Log::debug($this->company()->name .' : '.'item created successful');

      // Log::info($this->company()->name.': End paye store');

      return redirect()->route('payes.index')
      ->with('success', $translations['item created succssfully']);
      
    }catch(Exception $e){

      Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

      $errorTime = Carbon::now();;

      // Log::info($this->company()->name.': End paye store');

      return redirect()->back()

      ->with('error', $e->getMessage());

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function show(Paye $paye)
    {

        try{

          $locale = app()->getLocale();
  
          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('view', $paye);

          $countries = Country::all();

          $current_country = Country::find($paye->country_id);

  
            return Inertia::render('Payes/Show',compact('paye'));
  
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
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function edit(Paye $paye)
    {
       try{

            $countries = Country::all();

            $locale = app()->getLocale();

            $this->authorize('update', $paye);
  
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
          
            return Inertia::render('Payes/Edit',compact('paye','countries', 'translations'));
  
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
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayeRequest $request, Paye $paye)
    {
      // Log::info($this->company()->name.': Start paye update');

      try{

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $paye);

        $request['updated_by'] =  auth()->user()->id;

        $paye->update($request->all());

        // Log::info($this->company()->name.': End paye store');

        return redirect()->route('payes.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End paye update');

        return redirect()->back()

        ->with('error', $e->getMessage());
      }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paye $paye)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $paye);

        if ($paye->delete()){
          
          return redirect()->route('payes.index')
  
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
