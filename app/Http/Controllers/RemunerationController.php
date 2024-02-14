<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use App\Models\Tenant;

use Inertia\Response;

use App\Models\User;

use App\Models\Remuneration;

use App\Models\RemunerationType;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreRemunerationRequest;

use App\Http\Requests\UpdateRemunerationRequest;

use Carbon\Carbon;



use App\Http\Controllers\Controller;



class RemunerationController extends Controller
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

          $this->authorize('viewAny', Remuneration::class);
          // Log::info($this->company()->name.': Start remuneration index');

          $user = User::find(auth()->user()->id);

          return Inertia::render('Remunerations/Index',  [
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            'can' => ['create_remuneration' => $user->can('create', Remuneration::class)],
            
            'remunerations' => Remuneration::query()->where('remunerations.company_id', $this->company()->id)
                ->join('employees', 'employees.id','remunerations.employee_id')
                ->join('users', 'users.id','employees.user_id')
                ->join('remuneration_types', 'remuneration_types.id','remunerations.remuneration_type_id')
                ->select(
                  'remunerations.id as id',
                  'users.first_name',
                  'users.last_name',
                  'remunerations.employee_id',
                  'remuneration_types.name as remuneration_name',
                  'remunerations.company_id',
                  'remunerations.remuneration_type_id',
                  'remunerations.start_date',
                  'remunerations.end_date',
                  'remunerations.amount')
                 
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($remuneration) => [
                    'id' => $remuneration->id,
                    'company_id' => $remuneration->company_id,
                    'employee_id' => $remuneration->employee_id, 
                    'first_name' => $remuneration->first_name, 
                    'last_name' => $remuneration->last_name, 
                    'remuneration_name' => $remuneration->remuneration_name, 
                    'start_date' => $remuneration->start_date, 
                    'end_date' => $remuneration->end_date, 
                    'amount' => $remuneration->amount,                
                    'deleted_at' => $remuneration->deleted_at,
                ]),
           ]);        

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          // Log::info($this->company()->name.': End remuneration index');

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

        $this->authorize('create', Remuneration::class);

        $remuneration_types = RemunerationType::all();

        $employee_id = request('employee_id');

        $employee = Employee::find($employee_id);

        $user = User::find($employee->user_id); 

        $first_name = $user->first_name;
        $last_name = $user->last_name;
        
        $dt = Carbon::now();

        $today_date = $dt->toDateString();

        $end_date = Carbon::parse($user->dob)->addYears(60)->toDateString();

       

        

        return Inertia::render('Remunerations/Create', compact('today_date','end_date','first_name','last_name','remuneration_types','employee_id','translations'));

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
    public function store(StoreRemunerationRequest $request)
    {
      //get user id

      try{

          // Log::info($this->company()->name.': Start remuneration store');

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('create', Remuneration::class);
          //   $request['created_by'] =  auth()->user()->id;        

          $request['company_id'] = $this->company()->id;


          $remuneration= Remuneration::create($request->all());    

          Log::debug($this->company()->name.': Remuneration created successful');

          // Log::info($this->company()->name.': End remuneration store');

          return redirect()->route('remunerations.index')
          ->with('success', $translations['item created succssfully']);
          
        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          $errorTime = Carbon::now();;

          // Log::info($this->company()->name.': End remuneration store');

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
    public function show(Remuneration $remuneration)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('view', $remuneration);

        return Inertia::render('Remunerations/Show',compact('remuneration'));

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
    public function edit(Remuneration $remuneration)
    {    

        try{

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
          
          $this->authorize('update', $remuneration);

          $remuneration_type_id = $remuneration->remuneration_type_id;

          $remuneration_types = RemunerationType::all();

          return Inertia::render('Remunerations/Edit',compact('remuneration','remuneration_type_id','remuneration_types','translations'));

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
    public function update(UpdateRemunerationRequest $request, Remuneration $remuneration)
    {

      try{

       // Log::info($this->company()->name.': Start remuneration update');

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $remuneration);

        $request['updated_by'] =  auth()->user()->id;

        $remuneration->update($request->all());

        // Log::info($this->company()->name.': End remuneration store');

        return redirect()->route('remunerations.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End remuneration update');

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
    public function destroy(Remuneration $remuneration)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
   
        $this->authorize('delete', $remuneration);

        if ( $remuneration->delete()){
  
          
          return redirect()->route('remunerations.index')
  
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
