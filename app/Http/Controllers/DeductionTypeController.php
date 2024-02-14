<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use App\Models\Tenant;

use Inertia\Response;

use App\Models\User;

use App\Models\Deduction_type;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Deduction;

use App\Models\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreDeductionTypeRequest;

use App\Http\Requests\UpdateDeductionTypeRequest;

use Carbon\Carbon;



use App\Http\Controllers\Controller;



class DeductionTypeController extends Controller
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
      //TODO identify tenant and put it in log and audit trail
      //TODO refactor and use event for log and audit trail
     try{    

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('viewAny', Deduction_type::class);
          // Log::info($this->company()->name.': Start Deduction_type index');

          return Inertia::render('DeductionTypes/Index',  [
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            'can' => ['create_deduction_type' => $request->user()->can('create', Deduction_type::class)],
            'deduction_types' => Deduction_type::query()->where('company_id', $this->company()->id)
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($Deduction_type) => [
                    'id' => $Deduction_type->id,
                    'name' => $Deduction_type->name,
                    'description' => $Deduction_type->description,                 
                    'deleted_at' => $Deduction_type->deleted_at,
                ]),
           ]);        

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          Log::info($this->company()->name.': End Deduction type index');

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

        $this->authorize('create', Deduction_type::class);

        return Inertia::render('DeductionTypes/Create', compact('translations'));

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
    public function store(StoreDeductionTypeRequest $request)
    {
      //get user id

      try{

          // Log::info($this->company()->name.': Start Deduction_type store');

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('create', Deduction_type::class);

          $request['created_by'] =  auth()->user()->id;

          // $request['country_id'] =  $this->company()->country_id;

          $request['company_id'] = $this->company()->id;

          $Deduction_type= Deduction_type::create($request->all());    

          Log::debug($this->company()->name.': Deduction_type created successful');

          // Log::info($this->company()->name.': End Deduction_type store');

          return redirect()->route('deduction_types.index')
          ->with('success', $translations['item created succssfully']);
          
        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          $errorTime = Carbon::now();;

          // Log::info($this->company()->name.': End Deduction_type store');

          return redirect()->back()

          ->with('error', $e->getMessage());

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Deduction_type $deduction_type)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('view', $deduction_type);

          return Inertia::render('DeductionTypes/Show',compact('deduction_type'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Deduction_type $deduction_type)
    {    

        try{

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
        
          $this->authorize('update', $deduction_type);

          return Inertia::render('DeductionTypes/Edit',compact('deduction_type', 'translations'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeductionTypeRequest $request, Deduction_type $deduction_type)
    {

      try{

       // Log::info($this->company()->name.': Start Deduction_type update');

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $deduction_type);

        $request['updated_by'] =  auth()->user()->id;

        $deduction_type->update($request->all());

        // Log::info($this->company()->name.': End Deduction_type store');

        return redirect()->route('deduction_types.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End Deduction_type update');

        return redirect()->back()

        ->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deduction_type $deduction_type)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $deduction_type);

        $deduction_type_exist = Deduction::where('deduction_type_id',$deduction_type->id)->exists();

        if (!$deduction_type_exist && $deduction_type->delete()){
          
          return redirect()->route('deduction_types.index')
  
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
