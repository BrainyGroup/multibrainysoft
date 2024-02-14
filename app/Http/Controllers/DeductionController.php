<?php

namespace App\Http\Controllers;

use DB;

use Exception;

use Inertia\Inertia;

use Inertia\Response;

use Carbon\Carbon;

use App\Models\User;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Deduction;

use Illuminate\Http\Request;

use App\Models\Deduction_type;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreDeductionRequest;

use App\Http\Requests\UpdateDeductionRequest;


class DeductionController extends Controller
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

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('viewAny', Deduction::class);
        
        return Inertia::render('Deductions/Index',  [
          'translations' => $translations,
          'filters' => Req::all('search', 'trashed'),
          
          'deductions' => Deduction::query()->where('deductions.company_id', $this->company()->id)
              ->join('employees', 'employees.id','deductions.employee_id')
              ->join('users', 'users.id','employees.user_id')
              ->join('deduction_types', 'deduction_types.id','deductions.deduction_type_id')
              ->select(
                'deductions.id as id',
                'users.first_name',
                'users.last_name',
                'deductions.employee_id',
                'deductions.company_id',
                'deduction_types.name as deduction_name',
                'deductions.start_date',
                'deductions.end_date',
                'deductions.amount')
               
              ->orderByName()
              ->filter(Req::only('search', 'trashed'))
              ->paginate(10)
              ->withQueryString()
              ->through(fn ($deduction) => [
                  'id' => $deduction->id,
                  'company_id' => $deduction->company_id,
                  'employee_id' => $deduction->employee_id, 
                  'first_name' => $deduction->first_name, 
                  'last_name' => $deduction->last_name, 
                  'deduction_name' => $deduction->deduction_name, 
                  'start_date' => $deduction->start_date, 
                  'end_date' => $deduction->end_date, 
                  'amount' => $deduction->amount,                
                  'deleted_at' => $deduction->deleted_at,
              ]),
         ]);  


        // $company = $this->company();

        // Log::debug($company->name.': Start deduction index');

        // $employee = Employee::find(auth()->user()->id);

        // $deduction = DB::table('deductions')
        //
        // ->select('employee_id','deduction_type_id',
        //
        // DB::raw('SUM(amount) as deduction_amount'))
        //
        // ->where('deductions.company_id',1)
        //
        // ->groupBy('employee_id')
        //
        // ->groupBy('deduction_type_id');


          // $employees_deductions=DB::table('deductions')

          // ->join('employees','employees.id','deductions.employee_id')

          // ->join('users','users.id','employees.user_id')

          // ->joinSub($deduction,'deduction', function($join){
          //
          //   $join->on('employees.id','deduction.employee_id');
          //
          // })

          // ->join('deduction_types','deduction_types.id','deductions.deduction_type_id')

          //   ->select(

          //     'employees.*',

          //     'users.*',

          //     'deductions.*',

          //     'deduction_types.name as deduction_name'

          //     )

          //   ->where('deductions.company_id', $company->id )

            //->where('balance','>', 0 )

            //->where('status','!=',0 )            

          //   ->orderBy('employee_id')

          //   ->get();

          // return view('deductions.index', compact('employees_deductions'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::debug($company->name.': End deduction index');

        return redirect()->back()

        ->with('error', $e->getMessage());

      }


}


public function deductionDetails()
{

  $employee = Employee::find(auth()->user()->id);

  $company = Company::find($employee->company_id);


    $deduction = DB::table('deductions')

    ->select('employee_id','deduction_type_id',

    DB::raw('SUM(amount) as deduction_amount'))

    ->where('deductions.company_id',1)

    ->groupBy('employee_id')

    ->groupBy('deduction_type_id');


      $employees_deductions=DB::table('employees')

      ->join('users','users.id','employees.user_id')

      ->joinSub($deduction,'deduction', function($join){

        $join->on('employees.id','deduction.employee_id');

      })->join('deduction_types','deduction_types.id','deduction.deduction_type_id')

        ->select(

          'employees.*',

          'users.*',

          'deduction.*',

          'deduction_types.name as deduction_name'

          )

          ->orderBy('employees.id', 'asc')

        ->get();

      return view('deductions.deductions', compact('employees_deductions'));
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

        $this->authorize('create', Deduction::class); 

        $employee = Employee::find(request('employee_id'));

        $user = User::where('users.id', $employee->user_id)->first();

        $dt = Carbon::now();

        $today_date = $dt->toDateString();

        // $end_date = Carbon::parse($user->dob)->addYears(60)->toDateString();

        $first_name = $user->first_name;
        $last_name = $user->last_name;

        $deduction_types = Deduction_type::all();

        // return view('deductions.create', compact('deduction_types','user'));

        return Inertia::render('Deductions/Create', compact('translations', 'first_name','last_name','today_date', 'deduction_types','employee'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->authorize('create', Deduction::class);

      //Validation
      $this->validate(request(),[

 

        

      ]);

      // TODO: check deduction to see if it is working

     $start_date = new Carbon(request('start_date'));

      $company = $this->company();

      $deduction = new Deduction;

      $deduction->amount = request('amount');

      $deduction->interest = request('interest');

      $deduction->period = request('period');

      $deduction->interest_amount = ($deduction->interest/100) *  $deduction->amount;

      $deduction->total_amount =  $deduction->amount + $deduction->interest_amount;

      $deduction->monthly_amount =  $deduction->total_amount  / $deduction->period;

      $deduction->balance = $deduction->total_amount;

      $deduction->status = 1;

      $deduction->date_taken = request('date_taken');

      $deduction->start_date = request('start_date');

      $deduction->end_date = $start_date->addMonthsNoOverflow($deduction->period);

      $deduction->employee_id = request('employee_id');

      $deduction->company_id = $company->id;

      $deduction->deduction_type_id = request('deduction_type_id');

      $deduction->save();

      return back()->with('success','Deduction added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function show(deduction $deduction)
    {
      $this->authorize('view', $deduction);  

      return view('deductions.show',compact('deduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Deduction $deduction)
    {

      $this->authorize('update', $deduction);

      $employee = Employee::where('user_id',request('user_id'))->first();


      $user = User::where('users.id', $employee->user_id)->first();

      $deduction_types = Deduction_type::all();



        $current_deduction_type = Deduction_type::find($deduction->deduction_type_id);

        return view('deductions.edit',compact('deduction','deduction_types','current_deduction_type','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deduction $deduction)
    {
      
      $this->authorize('update', $deduction);
      //Validation
      $this->validate(request(),[

        'deduction_type_id' => 'required',

        'amount' =>'required|numeric',

        'start_date' => 'required|date',

      

      ]);

      //save data

  
  $start_date = new Carbon(request('start_date'));

  $deductionUpdate = Deduction::where('id', $deduction->id)

  ->update([


      'deduction_type_id'			=> $request->input('deduction_type_id'),

      'amount'	=> $request->input('amount'),

      'start_date'			=> $request->input('start_date'),

      'end_date' => $start_date->addMonthsNoOverflow($deduction->period),  

      'interest' => $request->input('interest'),

      'period' => request('period'),

      'interest_amount' => ($deduction->interest/100) *  $deduction->amount,

     'total_amount' =>  $deduction->amount + $deduction->interest_amount,

      'monthly_amount' =>  $deduction->total_amount  / $deduction->period,

     'balance' => $deduction->total_amount,     

      'date_taken' => request('date_taken'),

  ]);

  if($deductionUpdate)

    return redirect('deductions')

    ->with('success','Deduction updated successfully');
    //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deduction $deduction)
    {

      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

      $this->authorize('delete', $deduction);


      if ($deduction->delete()){

        return redirect('deductions')

        ->with('success', $translations['item deleted successfully']);

      }
    }catch(Exception $e){

      Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

      return redirect()->back()

      ->with('error', $e->getMessage());

      }
    }
}
