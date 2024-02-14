<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use App\Models\Tenant;

use Inertia\Response;

use App\Models\User;

use App\Models\Allowance_type;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Organization;

use App\Models\Allowance;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreAllowanceTypeRequest;

use App\Http\Requests\UpdateAllowanceTypeRequest;

use Carbon\Carbon;



use App\Http\Controllers\Controller;



class AllowanceTypeController extends Controller
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

          $this->authorize('viewAny', Allowance_type::class);
          // Log::info($this->company()->name.': Start allowance_type index');

          return Inertia::render('AllowanceTypes/Index',  [
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            'can' => ['create_allowance_type' => $request->user()->can('create', Allowance_type::class)],
            'allowance_types' => Allowance_type::query()->where('company_id', $this->company()->id)
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($allowance_type) => [
                    'id' => $allowance_type->id,
                    'name' => $allowance_type->name,
                    'description' => $allowance_type->description,                 
                    'deleted_at' => $allowance_type->deleted_at,
                ]),
           ]);        

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          // Log::info($this->company()->name.': End allowance type index');

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
        
        $this->authorize('create', Allowance_type::class); 

        return Inertia::render('AllowanceTypes/Create', compact('translations'));

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
    public function store(StoreAllowanceTypeRequest $request)
    {
      //get user id

      try{

          // Log::info($this->company()->name.': Start allowance_type store');

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('create', Allowance_type::class);

          $request['created_by'] =  auth()->user()->id;

          $request['country_id'] =  $this->company()->country_id;

          $request['company_id'] = $this->company()->id;

          $allowance_type= Allowance_type::create($request->all());    

          Log::debug($this->company()->name.': Allowance_type created successful');

          Log::info($this->company()->name.': End allowance type store');

          return redirect()->route('allowance_types.index')
          ->with('success', $translations['item created succssfully']);
          
        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          $errorTime = Carbon::now();;

          // Log::info($this->company()->name.': End allowance_type store');

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
    public function show(Allowance_type $allowance_type)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('view', $allowance_type);

          return Inertia::render('AllowanceTypes/Show',compact('allowance_type'));

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
    public function edit(Allowance_type $allowance_type)
    {    

        try{

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
        
          $this->authorize('update', $allowance_type);

          return Inertia::render('AllowanceTypes/Edit',compact('allowance_type', 'translations'));

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
    public function update(UpdateAllowanceTypeRequest $request, Allowance_type $allowance_type)
    {

      try{

       // Log::info($this->company()->name.': Start allowance_type update');

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $allowance_type);

        $request['updated_by'] =  auth()->user()->id;

        $allowance_type->update($request->all());

        // Log::info($this->company()->name.': End allowance_type store');

        return redirect()->route('allowance_types.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End allowance_type update');

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
    public function destroy(Allowance_type $allowance_type)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $allowance_type);
        
        $allowance_types_exist = Allowance::where('allowance_type_id',$allowance_type->id)->exists();

        if (!$allowance_types_exist && $allowance_type->delete()){
  
          
          return redirect()->route('allowance_types.index')
  
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
