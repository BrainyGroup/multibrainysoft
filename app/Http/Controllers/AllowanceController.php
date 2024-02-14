<?php

namespace App\Http\Controllers;

//use DB;

use Exception;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\User;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Allowance;

use Illuminate\Http\Request;

use App\Models\Allowance_type;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreAllowanceRequest;

use App\Http\Controllers\Controller;

use Carbon\Carbon;



class AllowanceController extends Controller
{

    public function __construct()
    {       
    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }


    public function index()
    {

      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('viewAny', Allowance::class);

        return Inertia::render('Allowances/Index',  [
          'translations' => $translations,
          'filters' => Req::all('search', 'trashed'),          
          
          'allowances' => Allowance::query()->where('allowances.company_id', $this->company()->id)
              ->join('employees', 'employees.id','allowances.employee_id')
              ->join('users', 'users.id','employees.user_id')
              ->join('allowance_types', 'allowance_types.id','allowances.allowance_type_id')
              ->select(
                'allowances.id as id',
                'users.first_name',
                'users.last_name',
                'allowances.employee_id',
                'allowances.company_id',
                'allowance_types.name as allowance_name',
                'allowances.start_date',
                'allowances.end_date',
                'allowances.amount')
               
              ->orderByName()
              ->filter(Req::only('search', 'trashed'))
              ->paginate(10)
              ->withQueryString()
              ->through(fn ($allowance) => [
                  'id' => $allowance->id,
                  'company_id' => $allowance->company_id,
                  'employee_id' => $allowance->employee_id, 
                  'first_name' => $allowance->first_name, 
                  'last_name' => $allowance->last_name, 
                  'allowance_name' => $allowance->allowance_name, 
                  'start_date' => $allowance->start_date, 
                  'end_date' => $allowance->end_date, 
                  'amount' => $allowance->amount,                
                  'deleted_at' => $allowance->deleted_at,
              ]),
         ]);  

        // $company = $this->company();

        // Log::debug($company->name.': Start allowance index');

        // $employee = Employee::find(auth()->user()->id);


        // // $allowance = DB::table('allowances')
        // //
        // // ->select('employee_id','allowance_type_id',
        // //
        // // DB::raw('SUM(amount) as allowance_amount'))
        // //
        // // ->where('allowances.company_id',$company->id)
        // //
        // // ->groupBy('employee_id')
        // //
        // // ->groupBy('allowance_type_id');


        //   $employees_allowances=DB::table('allowances')

          


        //   ->join('employees','employees.id','allowances.employee_id')

        //   ->join('users','users.id','employees.user_id')

        //   // ->joinSub($allowance,'allowance', function($join){
        //   //
        //   //   $join->on('employees.id','allowance.employee_id');
        //   //
        //   // })
        //   ->join('allowance_types','allowance_types.id','allowances.allowance_type_id')



        //     ->select(

        //       'employees.*',

        //       'users.*',

        //       'allowances.*',

        //       'allowance_types.name as allowance_name'

        //       )


        //     ->where('allowances.company_id', $company->id )
            

        //     ->orderBy('employee_id')

        //     ->get();

        //   Log::debug($company->name.': End allowance index');

        //   $now = Carbon::now();
        //   $current_year = $now->year;
        //   $current_month = $now->month;
              


        //   return view('allowances.index', compact('employees_allowances','current_year','current_month'));

          

      }catch(Exception $e){

          $company = $this->company();

          Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          Log::debug($company->name.': End allowance index');

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

          $this->authorize('create', Allowance::class);
             
          $employee = Employee::find(request('employee_id'));

          $user = User::where('users.id', $employee->user_id )->first(); 

          $dt = Carbon::now();

          $today_date = $dt->toDateString();
  
          $end_date = Carbon::parse($user->dob)->addYears(60)->toDateString();

          $first_name = $user->first_name;
          $last_name = $user->last_name;

          $allowance_types = Allowance_type::all();

          
  
          return Inertia::render('Allowances/Create', compact('translations', 'first_name','last_name','today_date','end_date', 'allowance_types', 'employee'));
  
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
    public function store(StoreAllowanceRequest $request)
    {

      try{  

        
          // Log::info($this->company()->name.': Start allowance store');

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('create', Allowance::class);
          
          $request['company_id'] = $this->company()->id;

          $allawance= Allowance::create($request->all());      

          return redirect('/employees/'. request('employee_id'));

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();;

        // Log::info($this->company()->name.': End allowance store');

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
    public function show(Allowance $allowance)
    {
      // $this->authorize('view', Allowance::class);  
      // return view('allowances.show',compact('allowance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Allowance $allowance)
    {

      $this->authorize('update', $allowance);

      $employee = Employee::where('user_id',request('user_id'))->first();

   

      $model_allowance_type = Allowance_type::find($allowance->allowance_type_id);

      $user = User::where('users.id', $employee->user_id)->first();

      $allowance_types = Allowance_type::all();

      return view('allowances.edit', compact('allowance_types', 'user','allowance','model_allowance_type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allowance $allowance)
    {

      //dd( $request->input('start_date'));

      $this->authorize('update', $allowance);

              //Validation
              $this->validate(request(),[

                'allowance_type_id' => 'required',

                'allowance_amount' =>'required|numeric',

                // 'start_date' => 'required|date',

                // 'end_date' => 'required|date',

              ]);

            //save data
        $allowanceUpdate = Allowance::where('id', $allowance->id)

        ->update([

            'allowance_type_id'			=> $request->input('allowance_type_id'),

            'amount'	=> $request->input('allowance_amount'),

            'start_date'			=> $request->input('start_date'),

            'end_date'	=> $request->input('end_date'),

        ]);

        if($allowanceUpdate)

          return redirect('allowances')

          ->with('success','Allowance updated successfully');
          //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowance $allowance)
    {
    
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $allowance);
      
        if ($allowance->delete()){
  
          
          return redirect()->route('allowances.index')
  
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
