<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use App\Models\Tenant;

use Inertia\Response;

use App\Models\User;

use App\Models\Employment_type;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreEmploymentTypeRequest;

use App\Http\Requests\UpdateEmploymentTypeRequest;

use Carbon\Carbon;



use App\Http\Controllers\Controller;



class EmploymentTypeController extends Controller
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
          
          $this->authorize('viewAny', Employment_type::class);
          // Log::info($this->company()->name.': Start Employment_type index');

          return Inertia::render('EmploymentTypes/Index',  [
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            'can' => ['create_employment_type' => $request->user()->can('create', Employment_type::class)],
            'employment_types' => Employment_type::query()->where('company_id', $this->company()->id)
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($employment_type) => [
                    'id' => $employment_type->id,
                    'name' => $employment_type->name,
                    'description' => $employment_type->description,                 
                    'deleted_at' => $employment_type->deleted_at,
                ]),
           ]);        

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          // Log::info($this->company()->name.': End Employment_type index');

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
        
        $this->authorize('create', Employment_type::class);

        return Inertia::render('EmploymentTypes/Create', compact('translations'));

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
    public function store(StoreEmploymentTypeRequest $request)
    {
      //get user id

      try{

          // Log::info($this->company()->name.': Start Employment_type store');

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('create', Employment_type::class);

          $request['created_by'] =  auth()->user()->id;

          $request['country_id'] =  $this->company()->country_id;

          $request['company_id'] = $this->company()->id;

          $Employment_type= Employment_type::create($request->all());    

          Log::debug($this->company()->name.': Employment_type created successful');

          Log::info($this->company()->name.': End Employment_type store');

          return redirect()->route('employment_types.index')
          ->with('success', $translations['item created succssfully']);
          
        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          $errorTime = Carbon::now();;

          // Log::info($this->company()->name.': End Employment_type store');

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
    public function show(Employment_type $employment_type)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('view', $employment_type);

        return Inertia::render('EmploymentTypes/Show',compact('employment_type'));

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
    public function edit(Employment_type $employment_type)
    {    

        try{

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
        
          $this->authorize('update', $employment_type);

          return Inertia::render('EmploymentTypes/Edit',compact('employment_type', 'translations'));

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
    public function update(UpdateEmploymentTypeRequest $request, Employment_type $employment_type)
    {

      try{

       // Log::info($this->company()->name.': Start Employment_type update');

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $employment_type);

        $request['updated_by'] =  auth()->user()->id;

        $employment_type->update($request->all());

        // Log::info($this->company()->name.': End Employment_type store');

        return redirect()->route('employment_types.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End Employment_type update');

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
    public function destroy(Employment_type $employment_type)
    {

      
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $employment_type);

        $employment_type_exist = Employee::where('employment_type_id', $employment_type->id)->exists();

        if (!$employment_type_exist && $employment_type->delete()){
  
          
          return redirect()->route('Employment_types.index')
  
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
