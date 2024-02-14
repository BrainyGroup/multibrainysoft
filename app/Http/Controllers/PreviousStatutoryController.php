<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use App\Models\Tenant;

use Inertia\Response;

use App\Models\User;

use App\Models\PreviousStatutory;

use App\Models\Company;

use App\Models\Statutory;

use App\Models\Employee;

use App\Models\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StorePreviousStatutoryRequest;

use App\Http\Requests\UpdatePreviousStatutoryRequest;

use Carbon\Carbon;



use App\Http\Controllers\Controller;



class PreviousStatutoryController extends Controller
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

          $this->authorize('viewAny', PreviousStatutory::class);
          // Log::info($this->company()->name.': Start previous_statutories index');
      

          return Inertia::render('PreviousStatutories/Index',  [
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            'can' => ['create_previous_statutory' => $request->user()->can('create', PreviousStatutory::class)],
            
            'previous_statutories' => PreviousStatutory::query()
            ->where('previous_statutories.company_id', $this->company()->id)
            ->join('employees', 'employees.id','previous_statutories.employee_id')
            ->join('users', 'users.id','employees.user_id')
            ->join('statutories', 'statutories.id','previous_statutories.statutory_id')
            ->select(
              'previous_statutories.id as id',
              'users.first_name',
              'users.last_name',
              'previous_statutories.employee_id',
              'previous_statutories.statutory_id',
              'previous_statutories.start_date',
              'previous_statutories.end_date',
              'previous_statutories.amount',
              'statutories.name as statutory_name',
                     
                  )
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($previous_statutory) => [
                    'id' => $previous_statutory->id,
                    'first_name' => $previous_statutory->first_name,
                    'last_name' => $previous_statutory->last_name,            
                    'company_id' => $previous_statutory->company_id,
                    'employee_id' => $previous_statutory->employee_id,  
                    'start_date' => $previous_statutory->start_date, 
                    'end_date' => $previous_statutory->end_date, 
                    'amount' => $previous_statutory->amount, 
                    'statutory_name' => $previous_statutory->statutory_name,                
                    'deleted_at' => $previous_statutory->deleted_at,
                ]),
           ]);        

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          // Log::info($this->company()->name.': End previous_statutories index');

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
    public function create(Request $request)
    {  
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('create', PreviousStatutory::class);

        $employee_id = request('employee_id');

        $statutory_id = request('statutory_id');

        $dt = Carbon::now();

        $today_date = $dt->toDateString();
       

        return Inertia::render('PreviousStatutories/Create', compact('translations','employee_id','statutory_id','today_date'));

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
    public function store(StorePreviousStatutoryRequest $request)
    {
      //get user id

      try{

          // Log::info($this->company()->name.': Start previous_statutories store');

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('create', PreviousStatutory::class);
          //   $request['created_by'] =  auth()->user()->id;        

          $request['company_id'] = $this->company()->id;

          $previous_statutories    = PreviousStatutory::updateOrCreate(
            ['employee_id' => request('employee_id'), 'statutory_id' => request('statutory_id'), 'company_id' => request('company_id')],
            ['amount' => request('amount'),'start_date' => request('start_date'),'end_date' => request('end_date')]
        );

         

          // $previous_statutories= PreviousStatutory::create($request->all());    

          Log::debug($this->company()->name.': PreviousStatutory created successful');

          // Log::info($this->company()->name.': End previous_statutories store');

          return redirect()->route('previous_statutories.index')
          ->with('success', $translations['item created succssfully']);
          
        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          $errorTime = Carbon::now();;

          // Log::info($this->company()->name.': End previous_statutories store');

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
    public function show(PreviousStatutory $previous_statutories)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('view', $previous_statutories);

        return Inertia::render('PreviousStatutories/Show',compact('previous_statutories'));

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
    public function edit(PreviousStatutory $previous_statutory)
    {   
      
          try{

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
        
          $this->authorize('update', $previous_statutory);

          return Inertia::render('PreviousStatutories/Edit',compact('previous_statutory', 'translations'));

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
    public function update(UpdatePreviousStatutoryRequest $request, PreviousStatutory $previous_statutory)
    {

      try{

       // Log::info($this->company()->name.': Start previous_statutories update');

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $previous_statutory);

        $request['updated_by'] =  auth()->user()->id;

        // dd($request);

        $previous_statutory->update($request->all());

        // Log::info($this->company()->name.': End previous_statutories store');

        return redirect()->route('previous_statutories.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End previous_statutories update');

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
    public function destroy(PreviousStatutory $previous_statutories)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $previous_statutory);

        $previous_statutories_employee_exist = Employee::where('previous_statutories_id',$previous_statutories->id)->exists();

        $previous_statutories_organization_exist = Organization::where('previous_statutories_id',$previous_statutories->id)->exists();
  
        $previous_statutories = PreviousStatutory::find($previous_statutories->id);
  
        if (!$previous_statutories_employee_exist && !$previous_statutories_employee_exist && $previous_statutories->delete()){
  
          
          return redirect()->route('previous_statutoriess.index')
  
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
