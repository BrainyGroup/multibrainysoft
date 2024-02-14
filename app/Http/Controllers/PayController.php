<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Allowance;

use App\Models\Center;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\Company;


use App\Models\Bank;

use App\Models\NetByBank;

use App\Models\Deduction;

use App\Models\Designation;

use App\Models\Employee;

use App\Models\Employment_type;

use App\Models\EmployeeStatutory;

use App\Jobs\SendEmailPaySlip;

use App\Models\Level;

use App\Models\Pay;

use App\Models\Paye;

use App\Models\Payroll_group;

use App\Models\Pay_allowance;

use App\Models\Pay_deduction;

use App\Models\Pay_statutory;

use App\Models\Statutory;

use App\Models\Salary;

use App\Models\Scale;

use App\Models\StatutoryPayment;

use App\Models\User;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StorePayRequest;

use App\Http\Requests\UpdatePayRequest;

use PDF;



class PayController extends Controller
{

    public function __construct()
    {
    }



    public function downloadPDF()
    {

        // Find posted pay

        // dd(request('id'));

      

        $pay = Pay::where('id',request('pay_id'))
            ->where('posted', true)->first();

        if ($pay == null) {

            return back()->with('error', 'Please post this pay');

        } else {
            //find out which company
            $company = $this->company();

            //find all pay statutories

            $pay_statutory = Pay_statutory::where('pay_number', $pay->pay_number)

                ->where('employee_id', $pay->employee->id)

                ->join('statutories', 'statutories.id', 'pay_statutories.statutory_id')

                ->join('statutory_types', 'statutory_types.id', 'statutories.statutory_type_id')

                ->select(
                    'pay_statutories.*',
                    'statutory_types.name as statutory_type_name',
                    'statutories.name as statutory_name')

                ->where('statutory_types.name', 'SSF')->first();

                $pay_statutory_HI = Pay_statutory::where('pay_number', $pay->pay_number)

                ->where('employee_id', $pay->employee->id)

                ->join('statutories', 'statutories.id', 'pay_statutories.statutory_id')

                ->join('statutory_types', 'statutory_types.id', 'statutories.statutory_type_id')

                ->select(
                    'pay_statutories.*',
                    'statutory_types.name as statutory_type_name',
                    'statutories.name as statutory_name')

                ->where('statutory_types.name', 'HI')->first();




               

            $pay_ssf_statutory_sum = Pay_statutory::where('employee_id', $pay->employee->id)

                ->join('statutories', 'statutories.id', 'pay_statutories.statutory_id')

                ->join('statutory_types', 'statutory_types.id', 'statutories.statutory_type_id')

                ->select(
                    'pay_statutories.*',
                    'statutory_types.name as statutory_type_name',
                    'statutories.name as statutory_name')

                ->where('statutory_types.name', 'SSF')->sum('pay_statutories.total');

            //find pay allowances

            $pay_allowances = Pay_allowance::where('pay_number', $pay->pay_number)

                ->where('employee_id', $pay->employee->id)

                ->where('amount','<>',0)

                ->join('allowance_types', 'allowance_types.id', 'pay_allowances.allowance_type_id')->get();
          

            //find pay deduction

            $pay_deductions = Pay_deduction::where('pay_number', $pay->pay_number)

                ->where('employee_id', $pay->employee->id)

                ->where('amount','<>',0)

                ->join('deduction_types', 'deduction_types.id', 'pay_deductions.deduction_type_id')->get();

            

            // load pdf and download
            $pdf = PDF::loadView('pdf.payslip', compact(
                'pay',
                'pay_allowances',
                'pay_deductions',
                'pay_statutory',
                'pay_statutory_HI',
                // 'pay_statutory_loan',
                'pay_ssf_statutory_sum')
            )->setOptions(['defaultFont' => 'sans-serif']);

            // $pdf = PDF::loadView('reports.today', ['Data' => $Data])->setOptions(['defaultFont' => 'sans-serif']);

            //set paper size and download

       

            $pdf->setPaper([0, 0, 297.638, 841.88976], 'portrait')->setWarnings(false)->save('myfile.pdf');

            $pdf->stream('hello.pdf');

            // return $pdf->download('payslip_' . $pay->pay_number . '_' . $pay->employee->identity . '.pdf');

        }

    }

    private function company()
    {
        $user = User::find(auth()->user()->id);

        return Company::find($user->company_id);
    }

    private function sendSalarySlipEmail($id, $company, $fromPaySlipEmail, $fromPaySlipName, $paySlipSubject, $payNumber)
    {

        $company = $this->company();

        $pay = Pay::where('pay_number', $payNumber)

            ->where('company_id', $company->id)

            ->where('posted', true)->first();

        if ($pay == null) {

            return back()->with('error', 'Please post this pay');

        } else {

            $user = User::findOrFail($id);

            $employee = Employee::where('user_id', $user->id)->first();

            // $user = User::find($employee->user_id);

            $designation = Designation::find($employee->designation_id);

            $scale = Scale::find($designation->scale_id);

            $level = Level::find($designation->level_id);

            $center = Center::find($employee->center_id);

            $payroll_group = Payroll_group::find($scale->payroll_group_id);
            

            $pay_statutory = Pay_statutory::where('pay_number', $pay->pay_number)

                ->where('employee_id', $employee->id)

                ->join('statutories', 'statutories.id', 'pay_statutories.statutory_id')

                ->join('statutory_types', 'statutory_types.id', 'statutories.statutory_type_id')

                ->select(
                    'pay_statutories.*',
                    'statutory_types.name as statutory_type_name',
                    'statutories.name as statutory_name')

                ->where('statutory_types.name', 'SSF')->first();


            $pay_ssf_statutory_sum = Pay_statutory::where('employee_id', $employee->id)

                ->join('statutories', 'statutories.id', 'pay_statutories.statutory_id')

                ->join('statutory_types', 'statutory_types.id', 'statutories.statutory_type_id')

                ->select(
                    'pay_statutories.*',
                    'statutory_types.name as statutory_type_name',
                    'statutories.name as statutory_name')

                ->where('statutory_types.name', 'SSF')->sum('pay_statutories.total');

            $pay_allowances = Pay_allowance::where('pay_number', $pay->pay_number)

                ->where('employee_id', $employee->id)

                ->join('allowance_types', 'allowance_types.id', 'pay_allowances.allowance_type_id')->get();

            $pay_deductions = Pay_deduction::where('pay_number', $pay->pay_number)

                ->where('employee_id', $employee->id)

                ->join('deduction_types', 'deduction_types.id', 'pay_deductions.deduction_type_id')->get();

            $employment_type = Employment_type::find($scale->employment_type_id);

            $data = [

                'email' => $fromPaySlipEmail,
                'sender' => $fromPaySlipName,
                'subject' => $paySlipSubject,

            ];

            Mail::send('emails.salary_slip', [
                'user' => $user,
                'pay' => $pay,
                'company' => $company,
                'employee' => $employee,
                'designation' => $designation,
                'scale' => $scale,
                'level' => $level,
                'center' => $center,
                'payroll_group' => $payroll_group,
                'employment_type' => $employment_type,
                'pay_allowances' => $pay_allowances,
                'pay_deductions' => $pay_deductions,
                'pay_statutory' => $pay_statutory,
                'pay_ssf_statutory_sum' => $pay_ssf_statutory_sum,
            ], function ($message) use (
                $user,
                $data
      
            ) {

                $message->from($data['email'], $data['sender']);

                $message->to($user->email, $user->firstname)->subject($data['subject']);

                // $message->attach($pathToFile, ['as' => $display, 'mime' => $mime]);
            });

        }

    }

//2 Sum of $allowanceSum
    private function allowanceSum($employee_id = null, $company_id = null)
    {

        return Allowance::where('employee_id', $employee_id)->sum('amount');

    }

// 4.1 Calculate statutory
    private function statutoryBeforePaye($employee_id = null, $company_id = null, $basic_salary = null)
    {

        $statutories = DB::table('employee_statutories')

            ->join('statutories', 'statutories.id', 'employee_statutories.statutory_id')

            ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

            ->where('employee_statutories.employee_id', $employee_id)

            ->where('employee_statutories.company_id', $company_id)

            ->where('statutories.before_paye', true)

            ->get();

        $pay_statutory_before['employee'] = 0;

        $pay_statutory_before['employer'] = 0;

        foreach ($statutories as $statutory) {

            $pay_statutory_before['employee'] = $pay_statutory_before['employee'] + ($statutory->employee * $basic_salary);

            $pay_statutory_before['employer'] = $pay_statutory_before['employer'] + ($statutory->employer * $basic_salary);

        }

        return $pay_statutory_before;
    }

// 4.2 Calculate statutory
    private function statutoryAfterPaye($employee_id = null, $company_id = null, $basic_salary = null)
    {
        $statutories = DB::table('employee_statutories')

            ->join('statutories', 'statutories.id', 'employee_statutories.statutory_id')

            ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

            ->where('employee_statutories.employee_id', $employee_id)

            ->where('employee_statutories.company_id', $company_id)

            ->where('statutories.before_paye', false)

            ->get();

        $pay_statutory_after['employee'] = 0;

        $pay_statutory_after['employer'] = 0;

        foreach ($statutories as $statutory) {

            $pay_statutory_after['employee'] = $pay_statutory_after['employee'] + ($statutory->employee * $basic_salary);

            $pay_statutory_after['employer'] = $pay_statutory_after['employer'] + ($statutory->employee * $basic_salary);

        }

        return $pay_statutory_after;
    }

//7 Paye
    private function paye($employee_id = null, $country_id = null, $taxable_salary = 0)
    {

        $taxable_pay = $taxable_salary;

        $payes = Paye::where('country_id', $country_id)->get();

        foreach ($payes as $paye) {

            if (($taxable_pay > $paye->minimum) && ($taxable_pay <= $paye->maximum)) {

                return ((($taxable_pay - $paye->minimum) * $paye->ratio) + $paye->offset);

            }

        }

    }

//9 deduction
private function deductionSum($employee_id = null,$company_id = null){

     // return Deduction::where('employee_id',$employee_id)->sum('amount');

      return Deduction::where('employee_id',$employee_id)->sum('monthly_amount');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function previousCreate()
    {
         $company = $this->company(); 
         
        $min_year = Pay::where('company_id', $company->id)->min('year');

        dd($min_year);

       

       $months = Pay::distinct('month')->where('company_id', $company->id)->get(['month']);

       

       //$month = DB::table('pays')->distinct('month')->get();

       if(!$min_year) $min_year = Carbon::now()->format('Y');

       $max_year = Carbon::now()->format('Y');

       $years = [];
       for ($y = $max_year;$y >=  $min_year; $y-- ){
        $years[] = $y;
       }
       
    	 return view('pays.create_previous', compact( 'years','months'));
        //  return Inertia::render('Pays/MonthlyCreate', compact( 'years','months','translations'));

    }

    public function index(Request $request)
    {
        

        try{

            $company = $this->company();

            $locale = app()->getLocale();
        
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);


            $this->authorize('viewAny', Pay::class);

            $can = ['create_pay' => Pay::query()->where('company_id', $this->company()->id)];

            $employeeExist = Employee::where('company_id', $company->id)->exists();

            if (!$employeeExist) {

                return redirect('users')->withInput()->with('error', 'Please add at least one employee to run eanring pay');
            }

            $login_user = Employee::where('user_id', auth()->user()->id)->first();

            $year = request('year');

            

            $month = request('month');

            if (strlen($month) == 1) {
                $month = '0' . $month;
            } 

          

            // $pays = Pay::where('company_id', $login_user->company_id)->get();
            if (request('other_month')){
                $pay_number = $year . $month;
                
            }else{
                $pay_number = Pay::where('company_id', $company->id)->max('pay_number');
            }
            
        //$pay_number = 202001;

            $pay_periods = DB::table('pays')->distinct()->select('pay_number')->get();

            $month_gross = Pay::where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->sum('gloss');

            $month_paye = Pay::where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->sum('paye');

 

                

            $month_net = Pay::where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->sum('net');

            $deduction_sum = Pay::where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->sum('deduction');
            
            $allowance_sum = Pay::where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->sum('allowance');

            $month_net_balance = Pay::where('pay_number', $pay_number)

            ->where('company_id', $company->id)

            ->sum('net_balance');

            $month_paid = $month_net -  $month_net_balance;

            $month_paye_amount = DB::table('statutory_payments')

            ->where('company_id',$company->id)

            ->where('pay_number', $pay_number)

        ->value('amount');


        $month_paye_balance = DB::table('statutory_payments')

        ->where('company_id',$company->id)

        ->where('pay_number', $pay_number)

        ->value('balance');

        


            $month_paye_paid = $month_paye_amount - $month_paye_balance; 

            


            $isPosted = Pay::where('company_id', $company->id)

                ->where('pay_number', $pay_number)

                ->where('posted', true)

                ->exists();

            $statutory_sum = Pay_statutory::where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->sum('total');

            $pay_statutories = DB::table('pay_statutories')

                ->select(

                    'statutory_id',

                    DB::raw('SUM(total) as total_amount'))

                ->where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->groupBy('statutory_id');

                $statutory_payments = DB::table('statutory_payments')

                ->select(

                    'statutory_id',

                    DB::raw('SUM(balance) as balance'))

    

                ->where('pay_number', $pay_number)

                ->where('company_id', $company->id)

                ->groupBy('statutory_id');

            $statutories = DB::table('statutories')

                

                ->joinSub($pay_statutories, 'pay_statutories', function ($join) {

                    $join->on('statutories.id', 'pay_statutories.statutory_id');            

                })

                ->joinSub($statutory_payments, 'statutory_payments', function ($join) {

                    $join->on('statutories.id', 'statutory_payments.statutory_id');            

                })

                ->select(

                    'pay_statutories.*',

                    'statutories.name as statutory_name',

                    'statutory_payments.*'

                )

                ->get();

            

            // $pays = DB::table('pays')
            //     ->where('pays.company_id', $company->id)
            //     ->join('employees', 'employees.id', 'pays.employee_id')
            //     ->join('users', 'users.id', 'employees.user_id')
            //     ->select(

            //         'users.*',

            //         'employees.*',

            //         'pays.*'
            //     )
            //     ->get();

        

            $total = $month_net + $month_paye + $statutory_sum + $deduction_sum;

            // dd($pay_number);
            $can = ['create_pay' => $request->user()->can('create', Pay::class)];

            
            return Inertia::render('Pays/Index', compact(
                // 'pays',
                'month_gross',
                'month_net',
                'month_paye',
                //'month_sdl',
                'statutories',
                'pay_number',
                'deduction_sum',
                'isPosted',
                'month_net_balance',
                'month_paid',
                'month_paye_paid',
                'month_paye_balance',
                'total',
                'can',
                'translations'
            ));
            }catch(Exception $e){

                Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
        
                // Log::info($this->company()->name.': End scale index');
        
                // $errorTime = Carbon::now();
        
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

            $this->authorize('create', Pay::class);

            $employeeExist = Employee::where('company_id', $this->company()->id )->exists();

            if (!$employeeExist) {

                return redirect('users')->withInput()->with('error', 'Please add at least one employee to view employees');
            }

            $currentMonth = date("n");

            $currentYear = date('Y');

            $years = [];

            for($i = $currentYear; $i>=$currentYear -3; $i--){
                array_push($years, $i);
            }

            // define("YEAR", date("Y") );
            // define("MONTH", date("n") ); 

            $months = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December',

            ];
            return Inertia::render('Pays/Create', compact('translations', 'months', 'years','currentYear','currentMonth'));
    
           
    
          }catch(Exception $e){
    
            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
    
            $errorTime = Carbon::now();        
    
            return redirect()->back()
    
            ->with('error', $e->getMessage());
    
          }      
    }

    /**
     * Store a storecreatenewly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        DB::transaction(function () {

            // TODO: below item should be company variable or setting
            $fromPaySlipEmail = 'payroll@datahousetza.com';
            $fromPaySlipName = 'Payroll Datahouse';
            $paySlipSubject = 'Pay Slip';
            $paye_sum = 0;
            $paye = 0;

            

            //end of todo
            $net_pay = request('net_pay');

            // dd($net_pay);

            

            $year = request('year');

            $month = request('month');

            if (strlen($month) == 1) {
                $month = '0' . $month;
            }

            $pay_number = $year . $month;

            $company = $this->company();

            $company->id = $company->id;

            //$company = Company::findOrFail($company->id);

            $company_name = $company->name;

            $company_logo = $company->logo;

            $company_domain = $company->website;

            $salaries = Salary::where('company_id', $company->id)->get();

            // $company = Company::find($company->id);

            $country_id = $company->country_id;
           

            $payPosted = Pay::where('pay_number', $pay_number)
                ->where('company_id', $company->id)
                ->where('posted', true)->exists();
           

            $payNotPosted = Pay::where('pay_number', $pay_number)
                ->where('company_id', $company->id)
                ->where('posted', false)->exists();

            if ($payPosted) {
                return back()->withInput()->with('error', 'Pay for selected month exist');
            } elseif ($payNotPosted) {
                

                $pays = Pay::where('pay_number', $pay_number)->get();

                foreach ($pays as $pay) {

                    $this->update($pay->id, $pay_number,$net_pay);
                }

                $pay_sum = Pay::where('pay_number', $pay_number)

                ->where('company_id', $company->id)
    
                ->sum('paye');

                DB::table('statutory_payments')              
                ->where('company_id', $company->id)
                ->where('pay_number', $pay_number)   
                ->where('statutory_id', 9999)             
            
                ->update(['amount' => $pay_sum,
                          'balance' => $pay_sum,
                          'updated_at' => now()]);


                // DB::table('statutory_payment_history')              
                // ->where('company_id', $company->id)
                // ->where('pay_number', $pay_number)   
                // ->where('statutory_id', 9999)             
            
                // ->update(['amount' => $pay_sum,                         
                //           'updated_at' => now()]);
                
                return redirect('pays');



            } else {

                foreach ($salaries as $salary) {

                    $paye = 0;

                    $employee_id = $salary->employee_id;

                    $employee = Employee::select('user_id')
                        ->where('id', $employee_id)
                        ->where('company_id', $company->id)
                        ->first();

        

                    

                    $basic_salary = $salary->amount;

                    $allowance = $this->allowanceSum($employee_id, $company->id);

                    $statutory_before_paye = $this->statutoryBeforePaye($employee_id, $company->id, $basic_salary);

                    $statutory_after_paye = $this->statutoryAfterPaye($employee_id, $company->id, $basic_salary);

                    $salary_after_statutory_before_paye = $basic_salary - $statutory_before_paye['employee'];

                    $taxable = $salary_after_statutory_before_paye + $allowance;

                    $gloss = $basic_salary + $allowance;

                    $paye = $this->paye($employee_id, $country_id, $taxable);

                    //dd( $statutory_after_paye['employee']);

                    //dd($taxable);

                    //dd($paye);
                    $statutury_after_pay_value = $statutory_after_paye['employee'];

                    $monthly_earning = $taxable - $paye - $statutury_after_pay_value;

                    //dd( $monthly_earning);

                    $deduction = $this->deductionSum($employee_id, $company->id);

                    $net = $monthly_earning - $deduction;

                    

                    $paye_sum = $paye_sum + $paye;

                    if($net_pay)
                    { 
                        $net_balance = 0; 
                    }else{
                        $net_balance = $net;
                    }              



                    //dd($paye);

                 
   

                    $lastPayId = DB::table('pays')->insertGetId([

                       

                        'company_id' => $company->id,

                        'employee_id' => $employee_id,

                        'run_date' => Carbon::now(),

                        'pay_number' => $pay_number,

                        'basic_salary' => $basic_salary,

                        'allowance' => $allowance,

                        'gloss' => $basic_salary + $allowance,

                        'taxable' => $taxable,

                        'paye' => $paye,

                        'statutory_after_paye' => $statutury_after_pay_value,

                        'monthly_earning' => $monthly_earning,

                        'deduction' => $deduction,           
                                        
                        'net' => $net,

                        'year' => $year,

                        'month' => $month,

                        'net_balance' => $net_balance,

                        'created_at' =>now(),

                        'updated_at' =>now(),

                            ]);         
                    
     

                // DB::table('employee_payments')->insert([
                //     'company_id' => $company->id,
                //     'employee_id' => $employee_id,                   
                //     'pay_number' => $pay_number,
                //     'month' =>  $month,
                //     'year' =>  $year,
                //     'balance' =>   $net_balance,
                //     'amount' =>   $net,
                //     'pay_date' =>   now(),                    
                //     'created_at' =>now(),
                //     'updated_at' =>now(),
                // ]);

            
                            
            $deductions = DB::table('deductions')

            ->join('deduction_types', 'deduction_types.id','deductions.deduction_type_id')
            
            ->select('deductions.*','deductions.id as deduction_id')
            
                ->where('deductions.employee_id',$employee_id)  
            
            ->where('deductions.company_id', $company->id) 
            
            ->where('deductions.start_date','<=', Carbon::now()->format('Y-m-d')) 
            
            ->where('deductions.end_date','>=', Carbon::now()->format('Y-m-d')) 
            
            ->get();

  foreach($deductions as $deduction){
     if(($deduction->balance > 0) && ($deduction->balance >= $deduction->monthly_amount)){
      DB::table('pay_deductions')->insert([
        'company_id' => $company->id,
        'employee_id' => $employee_id,
        'pay_id' => $lastPayId,
        'pay_number' => $pay_number,
        'deduction_type_id' =>  $deduction->deduction_type_id,
        'amount' =>   $deduction->monthly_amount,
        'deduction_id' =>   $deduction->deduction_id, 
        'year' => $year,
        'month' => $month,                   
        'created_at' =>now(),
        'updated_at' =>now(),
    ]);

    $balance =  $deduction->balance -  $deduction->monthly_amount;

    if ($balance < $deduction->monthly_amount ){
      $monthly_amount = $balance;
    }else{
      $monthly_amount = $deduction->monthly_amount;
    }

    DB::table('deductions')
    ->where('employee_id', $employee_id)
    ->where('company_id', $company->id)
    ->where('deduction_type_id', $deduction->deduction_type_id)
    ->where('id', $deduction->id)

    ->update(['balance' => $balance,
              'monthly_amount' => $monthly_amount,
              'updated_at' => now()]);

     }else{

      DB::table('pay_deductions')->insert([
        'company_id' => $company->id,
        'employee_id' => $employee_id,
        'pay_id' => $lastPayId,
        'pay_number' => $pay_number,
        'deduction_type_id' =>  $deduction->deduction_type_id,
        'amount' =>   $deduction->balance,
        'deduction_id' =>   $deduction->deduction_id,  
        'year' => $year,
        'month' => $month,                  
        'created_at' =>now(),
        'updated_at' =>now(),
    ]);



    DB::table('deductions')
    ->where('employee_id', $employee_id)
    ->where('company_id', $company->id)
    ->where('deduction_type_id', $deduction->deduction_type_id)
    ->where('id', $deduction->id)

    ->update(['balance' => 0.00,'updated_at' => now(),'monthly_amount' => 0.00 , 'status' => 0]);


      

     }
  
   
          }        



                $allowances = DB::table('allowances')

                        ->join('allowance_types', 'allowance_types.id', 'allowances.allowance_type_id')

                        ->select('allowances.*', 'allowances.id as allowance_id')

                        ->where('allowances.employee_id', $employee_id)

                        ->where('allowances.company_id', $company->id)

                        ->where('allowances.start_date','<=', Carbon::now()->format('Y-m-d')) 

                        ->where('allowances.end_date','>=', Carbon::now()->format('Y-m-d')) 

                        ->get();

                    foreach ($allowances as $allowance) {

                        DB::table('pay_allowances')->insert([
                            'company_id' => $company->id,
                            'employee_id' => $employee_id,
                            'pay_id' => $lastPayId,
                            'pay_number' => $pay_number,
                            'allowance_type_id' => $allowance->allowance_type_id,
                            'amount' => $allowance->amount,
                            'allowance_id' => $allowance->allowance_id,
                            'year' => $year,
                            'month' => $month, 
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }


                    $remunerations = DB::table('remunerations')

                    ->join('remuneration_types', 'remuneration_types.id', 'remunerations.remuneration_type_id')

                    ->select('remunerations.*', 'remunerations.id as remuneration_id')

                    ->where('remunerations.employee_id', $employee_id)

                    ->where('remunerations.company_id', $this->company()->id)

                    ->where('remunerations.start_date','<=', Carbon::now()->format('Y-m-d')) 

                    ->where('remunerations.end_date','>=', Carbon::now()->format('Y-m-d')) 

                    ->get();

                    // dd($remunerations );

                foreach ($remunerations as $remuneration) {

                    DB::table('pay_remunerations')->insert([
                        'company_id' => $company->id,
                        'employee_id' => $employee_id,
                        'pay_id' => $lastPayId,
                        'pay_number' => $pay_number,
                        'remuneration_type_id' => $remuneration->remuneration_type_id,
                        'amount' => $remuneration->amount,
                        'balance' => $remuneration->amount,
                        'remuneration_id' => $remuneration->remuneration_id,
                        'year' => $year,
                        'month' => $month, 
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                    $statutories = DB::table('employee_statutories')

                        ->join('statutories', 'statutories.id', 'employee_statutories.statutory_id')

                        ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

                        ->where('employee_statutories.employee_id',$employee_id) 

                        ->where('employee_statutories.company_id', $company->id)

                        ->get();

                       



                       

                    foreach ($statutories as $statutory) {

                        if ($statutory->base_id == 1) {
                            $statutory_employee = $statutory->employee * $basic_salary;
                            $statutory_employer = $statutory->employer * $basic_salary;
                        } else {
                            $statutory_employee = $statutory->employee * $gloss;
                            $statutory_employer = $statutory->employer * $gloss;
                        }

                        $employee_statutory_no = EmployeeStatutory::where('company_id', $company->id)
                        ->where('employee_id',$employee_id)
                        ->where('statutory_id', $statutory->id)                                            
                        ->value('employee_statutory_no');

                       // dd( $statutory_employer + $statutory_employee);

                        if(!$employee_statutory_no) $employee_statutory_no = "";



                       
                        DB::table('pay_statutories')->insert([
                            'company_id' => $company->id,
                            'employee_id' => $employee_id,
                            'pay_id' => $lastPayId,
                            'pay_number' => $pay_number,
                            'employee' => $statutory_employee,
                            'employer' => $statutory_employer,
                            'total' => $statutory_employer + $statutory_employee,
                            'statutory_id' => $statutory->id,
                            'employee_statutory_no'=> $employee_statutory_no,
                            'year' => $year,
                            'month' => $month, 
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }

// $this->sendSalarySlipEmail($employee->user_id,$company,$fromPaySlipEmail,$fromPaySlipName,$paySlipSubject,$lastPayId);

                }

                DB::table('statutory_payments')->insert([
                    'company_id' => $company->id,                               
                    'pay_number' => $pay_number,
                    'statutory_id' => 9999,
                    'month' =>  $month,
                    'year' =>  $year,
                    'amount' =>   $paye_sum,
                    'balance' =>   $paye_sum,
                    'pay_date' =>   now(),                    
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ]);


                $pay_statutories = DB::table('pay_statutories')

                ->select(
        
                  'statutory_id',
        
                  DB::raw('SUM(total) as total_amount'))
        
                  ->where('pay_number',$pay_number)
        
                   ->where('company_id',$company->id)
        
                  ->groupBy('statutory_id')->get();

                  foreach($pay_statutories as $pay_statutory){

                  DB::table('statutory_payments')->insert([
                    'company_id' => $company->id,                               
                    'pay_number' => $pay_number,
                    'statutory_id' => $pay_statutory->statutory_id,
                    'month' =>  $month,
                    'year' =>  $year,
                    'amount' =>   $pay_statutory->total_amount,
                    'balance' =>   $pay_statutory->total_amount,
                    'pay_date' =>   now(),                    
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ]);
                  }
    
                // DB::table('statutory_payment_history')->insert([
                //     'company_id' => $company->id,                               
                //     'pay_number' => $pay_number,
                //     'statutory_id' => 9999,
                //     'month' =>  $month,
                //     'year' =>  $year,
                //     'amount' =>   $paye_sum,
                //     'pay_date' =>   now(),                    
                //     'created_at' =>now(),
                //     'updated_at' =>now(),
                // ]);
            }

           
    

        });


        

       

        return redirect('pays');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {

        $company = $this->company();

        $employeeExist = Employee::where('company_id', $company->id)->exists();

        if (!$employeeExist) {

            return redirect('users')->withInput()->with('error', 'Please add at least one employee to view employees');
        }
        return view('pays.show', compact('pay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company();

        $employeeExist = Employee::where('company_id', $company->id)->exists();

        if (!$employeeExist) {

            return redirect('users')->withInput()->with('error', 'Please add at least one employee to view employees');
        }

        //return view('pays.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post($max_pay)
    {

        $company = $this->company();

        DB::table('pays')

            ->where('pay_number', $max_pay)

            ->where('company_id', $company->id)

            ->update([
                'posted' => 1,

            ]);

            // DB::table('employee_payments')

            // ->where('pay_number', $max_pay)

            // ->where('company_id', $company->id)

            // ->update([
            //     'posted' => 1,

            // ]);

        $pays = Pay::where('pay_number', $max_pay)->get();

        foreach ($pays as $pay) {

            $fromPaySlipEmail = 'payroll@datahousetza.com';
            $fromPaySlipName = 'Payroll '. $company->name;
            $paySlipSubject = 'Pay Slip';

            $employee = Employee::findOrFail($pay->employee_id);

            $user = User::findOrFail(2);

            dispatch(new SendEmailPaySlip($pay, $company, $user))->delay(now()->addMinutes(60));

            // $this->sendSalarySlipEmail($employee->user_id,$pay->company_id,$fromPaySlipEmail,$fromPaySlipName,$paySlipSubject,$pay->pay_number);

        }

        return back();

    }

    public function update($id, $pay_number,$net_pay)
    {

        $pay = Pay::find($id);

        $company = $this->company();

        $salary = Salary::where('employee_id', $pay->employee_id)

            ->where('company_id', $pay->company_id)

            ->first();

        

        $employee_id = $salary->employee_id;

        //$company->id = $salary->company_id;

        $basic_salary = $salary->amount;

        $allowance = $this->allowanceSum($employee_id, $company->id);

        $statutory_before_paye = $this->statutoryBeforePaye($employee_id, $company->id, $basic_salary);

        $statutory_after_paye = $this->statutoryAfterPaye($employee_id,  $company->id, $basic_salary);

       

        $salary_after_statutory_before_paye = $basic_salary - $statutory_before_paye['employee'];

        $taxable = $salary_after_statutory_before_paye + $allowance;

        $gloss = $basic_salary + $allowance;

        $paye = $this->paye($employee_id, $company->id, $taxable);

        $statutury_after_pay_value = $statutory_after_paye['employee'];

        
        $monthly_earning = $taxable - $paye - $statutory_after_paye['employee'];

        $deduction = $this->deductionSum($employee_id, $company->id);

        $net = $monthly_earning - $deduction;

        
        if($net_pay)
        { 
            $net_balance = 0; 
        }else{
            $net_balance = $net;
        }


        DB::table('pays')

            ->where('id', $id)

            ->where('company_id', $company->id)

            ->update([

                'run_date' => Carbon::now(),

                'basic_salary' => $basic_salary,

                'allowance' => $allowance,

                'gloss' => $basic_salary + $allowance,

                'taxable' => $taxable,

                'paye' => $paye,

                'statutory_after_paye' => $statutury_after_pay_value,

                'monthly_earning' => $monthly_earning,

                'deduction' => $deduction,

                'net' => $net,

                'net_balance' => $net_balance,

                'updated_at' => now(),

            ]);

            

            // DB::table('employee_payments')

            // ->where('company_id', $company->id)

            // ->where('employee_id', $employee_id)

            // ->where('pay_number', $pay_number)

            // ->update([

            //     'balance' =>   $net_balance,
            //     'pay_date' =>   now(),                    
                
            //     'updated_at' =>now(),
            // ]);

        //  $statutories = Employee::find($employee_id)->statutories()
        // ->where('statutories.company_id', $company->id)
        // ->get();
        $deductions = DB::table('deductions')

            ->join('deduction_types', 'deduction_types.id', 'deductions.deduction_type_id')

            ->select('deductions.*', 'deductions.id as deduction_id')

            ->where('deductions.employee_id', $employee_id)

            ->where('deductions.company_id', $company->id)

            ->get();

        foreach ($deductions as $deduction) {

            DB::table('pay_deductions')
                ->where('pay_id', $id)
                ->where('employee_id', $employee_id)
                ->where('company_id', $company->id)
                ->where('deduction_type_id', $deduction->deduction_type_id)
                ->update([
                    'pay_number' => $pay_number,
                    'deduction_type_id' => $deduction->deduction_type_id,
                    'amount' => $deduction->amount,
                    'deduction_id' => $deduction->deduction_id,

                    'updated_at' => now(),
                ]);
        }

        $allowances = DB::table('allowances')

            ->join('allowance_types', 'allowance_types.id', 'allowances.allowance_type_id')

            ->select('allowances.*', 'allowances.id as allowance_id')

            ->where('allowances.employee_id', $employee_id)

            ->where('allowances.company_id', $company->id)

            ->get();

        foreach ($allowances as $allowance) {

            DB::table('pay_allowances')
                ->where('pay_id', $id)
                ->where('employee_id', $employee_id)
                ->where('company_id', $company->id)
                ->where('allowance_type_id', $allowance->allowance_type_id)
                ->update([

                    'pay_number' => $pay_number,
                    'allowance_type_id' => $allowance->allowance_type_id,
                    'amount' => $allowance->amount,
                    'allowance_id' => $allowance->allowance_id,

                    'updated_at' => now(),
                ]);
        }

        $statutories = DB::table('employee_statutories')

            ->join('statutories', 'statutories.id', 'employee_statutories.statutory_id')

            ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

            ->where('employee_statutories.employee_id', $employee_id)

            ->where('employee_statutories.company_id', $company->id)

            ->get();

        foreach ($statutories as $statutory) {

            if ($statutory->base_id == 1) {
                $statutory_employee = $statutory->employee * $basic_salary;
                $statutory_employer = $statutory->employer * $basic_salary;
            } else {
                $statutory_employee = $statutory->employee * $gloss;
                $statutory_employer = $statutory->employer * $gloss;
            }

            DB::table('pay_statutories')
                ->where('pay_id', $id)
                ->where('employee_id', $employee_id)
                ->where('company_id', $company->id)
                ->where('statutory_id', $statutory->id)
                ->update([

                    'employee' => $statutory_employee,
                    'employer' => $statutory_employer,
                    'total' => $statutory_employer + $statutory_employee,

                    'updated_at' => now(),
                ]);
        }

        
        $pay_statutories = DB::table('pay_statutories')

        ->select(

          'statutory_id',

          DB::raw('SUM(total) as total_amount'))

          ->where('pay_number',$pay_number)

           ->where('company_id',$company->id)

          ->groupBy('statutory_id')->get();


          foreach($pay_statutories as $pay_statutory){

            DB::table('statutory_payments')
            ->where('pay_number',$pay_number)         
         
            ->where('company_id', $company->id)
            ->where('statutory_id', $pay_statutory->statutory_id)
            ->update([

                'amount' => $pay_statutory->total_amount,
                'balance' => $pay_statutory->total_amount,

                'updated_at' => now(),
            ]);

        
          }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        // TODO: delete with its statutory, allowance and deductions
        $is_unposted_pay = Pay::uposted('id', $pay->id)->exixts();

        if ($is_unposted_pay) {

            DB::transaction(function () use ($pay) {

                DB::table('pays')
                    ->where('id', $pay->id)
                    ->delete();

                DB::table('pay_statutories')
                    ->where('pay_id', $pay->id)
                    ->delete();

                DB::table('pay_allowances')
                    ->where('pay_id', $pay->id)
                    ->delete();

                DB::table('pay_deductions')
                    ->where('pay_id', $pay->id)
                    ->delete();

            });

            return redirect('pays.index')

                ->with('success', 'Pay deleted successfully');

        } else {

            return back()->withInput()->with('error', 'Pay could not be deleted');

        }
    }

    public function payDetails(Request $request)
    {

    
          $locale = app()->getLocale();
    
          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

    			$max_pay = request('pay_number');

                

          // $users = $this->through('employees')->has('pays');


          // $users = Pay::with('users')->get();

          // dd($users);


          return Inertia::render('Pays/PayDetails',  [
            'max_pay' => $max_pay,
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            'can' => ['create_pay' => Pay::query()->where('company_id', $this->company()->id)],
            
            'pays' => Pay::query()
            ->where('pays.company_id', $this->company()->id)
            ->where('pays.pay_number', $max_pay)
            ->join('employees', 'employees.id','pays.employee_id')
            ->join('users', 'users.id','employees.user_id')
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($pay) => [
                    'id' => $pay->id,
                    'name' => $pay->name,
                    'first_name' => $pay->first_name,                 
                    'middle_name' => $pay->middle_name,
                    'last_name' => $pay->last_name,
                    'run_date' => $pay->run_date,
                    'pay_number' => $pay->pay_number,
                    'basic_salary' => $pay->basic_salary,
                    'allowance' => $pay->allowance,                 
                    'gloss' => $pay->gloss,
                    'taxable' => $pay->taxable,
                    'paye' => $pay->paye,
                    'monthly_earning' => $pay->monthly_earning,
                    'deduction' => $pay->deduction,
                    'net' => $pay->net,
                    'net_paid' => $pay->net - $pay->net_balance, 
                    'net_balance' => $pay->net_balance,   
                    'deleted_at' => $pay->deleted_at,
                ]),
           ]);  

         


    }

    public function net(Request $request)
    {

      $locale = app()->getLocale();

      $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
   

      $max_pay = request('pay_number');


      $net_total = DB::table('pays')

      ->where('pays.company_id', $this->company()->id)

      ->where('pay_number', $max_pay)

      ->sum('net');

      $net_balance = DB::table('pays')

      ->where('pays.company_id', $this->company()->id)

      ->where('pay_number', $max_pay)

      ->sum('pays.net_balance');

      $net_paid = $net_total - $net_balance;

    //   $nets = Pay::all();

     



      return Inertia::render('Pays/Net',  [
        'max_pay' => $max_pay,
        'net_total' => $net_total,
        'net_balance' => $net_balance,
        'net_paid' => $net_paid,
        'translations' => $translations,
        'filters' => Req::all('search', 'trashed'),
        
        'nets' => Pay::query()
        ->where('pays.company_id', $this->company()->id)
        ->where('pays.pay_number', $max_pay)
        ->join('employees', 'employees.id','pays.employee_id')
        ->join('users', 'users.id','employees.user_id')
        ->join('banks', 'banks.id','employees.bank_id')

        ->select(
            'pays.id as id',
            'users.first_name',
            'users.middle_name',
            'users.last_name',
            'pays.run_date',
            'pays.pay_number',
            'employees.account_number',
            'pays.employee_id',
            'pays.basic_salary',
            'banks.name as bank_name',
            'pays.net',           
            'pays.net_balance'      
            )

            ->orderByName()
            ->filter(Req::only('search', 'trashed'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($net) => [
                'id' => $net->id,               
                'first_name' => $net->first_name,                 
                'middle_name' => $net->middle_name,
                'last_name' => $net->last_name,
                'run_date' => $net->run_date,
                'employee_id' => $net->employee_id,
                'pay_number' => $net->pay_number,
                'account_number' => $net->account_number,
                'basic_salary' => $net->basic_salary,
                'bank_name' => $net->name,       
                'net' => $net->net,
                'net_paid' => $net->net - $net->net_balance, 
                'net_balance' => $net->net_balance,   
                'deleted_at' => $net->deleted_at,
            ]),
       ]);  

    }  

    public function statutoryList(Request $request)
    {

      $locale = app()->getLocale();

      $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
             

            $max_pay = request('pay_number');

            $statutory_id = request('statutory_id');

          

            $statutory = Statutory::find($statutory_id);

          

            $statutory_name = $statutory->name;

            
            $total_statutory = DB::table('pay_statutories')

            ->where('pay_statutories.company_id', $this->company()->id)

            ->where('pay_statutories.statutory_id',  $statutory_id)

            ->where('pay_number', $max_pay)

            ->sum('pay_statutories.total');

            return Inertia::render('Pays/StatutoryList',  [
                'max_pay' => $max_pay,
                'total_statutory' => $total_statutory,
                'statutory_name' => $statutory_name,               
                'translations' => $translations,
                'filters' => Req::all('search', 'trashed'),
                
                'pay_statutories' => Pay_Statutory::query()
                ->where('pay_statutories.company_id', $this->company()->id)
                ->where('pay_statutories.pay_number', $max_pay)
                ->where('pay_statutories.statutory_id',  $statutory_id)
                ->join('employees', 'employees.id','pay_statutories.employee_id')
                ->join('users', 'users.id','employees.user_id')
               
                    // ->orderByName()
                    ->filter(Req::only('search', 'trashed'))
                    ->paginate(10)
                    ->withQueryString()
                    ->through(fn ($pay_statutory) => [
                        'id' => $pay_statutory->id,               
                        'first_name' => $pay_statutory->first_name,                 
                        'middle_name' => $pay_statutory->middle_name,
                        'last_name' => $pay_statutory->last_name,
                        'pay_number' => $pay_statutory->pay_number,
                        'month' => $pay_statutory->pay_number,
                        'year' => $pay_statutory->pay_number,
                        'employee' => $pay_statutory->employee,
                        'employer' => $pay_statutory->employer,
                        'total' => $pay_statutory->total,
                        'employee_statutory_no' => $pay_statutory->employee_statutory_no,   
                        'deleted_at' => $pay_statutory->deleted_at,
                    ]),
               ]);   
      }

      public function netByBank(Request $request)
      {

      $locale = app()->getLocale();

      $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
            

          $max_pay = request('pay_number');


          $net_total = DB::table('pays')

          ->where('pays.company_id', $this->company()->id)

          ->where('pay_number', $max_pay)

          ->sum('net');


          $net_balance = DB::table('pays')

          ->where('company_id', $this->company()->id)

          ->where('pay_number', $max_pay)

          ->sum('net_balance');

         



          $net_paid = $net_total - $net_balance;

          

         
          return Inertia::render('Pays/NetByBank',  [
            'max_pay' => $max_pay,
            'net_total' => $net_total,
            'net_balance' => $net_balance,
            'net_paid' => $net_paid,               
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            
            'net_by_banks' => NetByBank::query()
            ->where('company_id', $this->company()->id)
            ->where('pay_number', $max_pay)
            ->filter(Req::only('search', 'trashed'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($net_by_bank) => [

                'bank_id' => $net_by_bank->bank_id,                         
                'bank_name' => $net_by_bank->bank_name,
                'pay_number' => $net_by_bank->pay_number,                 
                'amount' => $net_by_bank->bank_amount,
                'balance' => $net_by_bank->balance,
                'paid' => $net_by_bank->paid,  
                'deleted_at' => $net_by_bank->deleted_at,
            ])

       ]);   

      }

      public function netListByBank(Request $request)
      {

        
        $locale = app()->getLocale();
  
        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
               
  
              $max_pay = request('max_pay');
  
              $bank_id = request('bank_id');

            //   dd($bank_id);
  
              $bank = Bank::find($bank_id);              
  
              $bank_name = $bank->name;
  
  
              $net_total = DB::table('pays')
  
              ->where('pays.company_id', $this->company()->id)
  
              ->where('pay_number', $max_pay)
  
              ->where('bank_id', $bank_id)
  
              ->join('employees', 'employees.id','pays.employee_id')
  
              ->join('banks', 'banks.id','employees.bank_id')
  
              ->sum('net');

  
              $net_balance = DB::table('pays')
  
              ->where('pays.company_id', $this->company()->id)
  
              ->where('pay_number', $max_pay)
  
              ->where('bank_id', $bank_id)
  
              ->join('employees', 'employees.id','pays.employee_id')
  
              ->join('banks', 'banks.id','employees.bank_id')
  
              ->sum('net_balance');

  
              $net_paid = $net_total - $net_balance;


                //  $test =        Pay::query()
                //  ->where('pays.company_id', $this->company()->id)
                //  ->where('pays.pay_number', $max_pay)
                //  ->join('employees', 'employees.id','pays.employee_id')
                //  ->join('users', 'users.id','employees.user_id')
                //  ->join('banks', 'banks.id','employees.bank_id');

                // dd($test);

              return Inertia::render('Pays/NetListByBank',  [
                'max_pay' => $max_pay,
                'net_total' => $net_total,
                'net_balance' => $net_balance,
                'net_paid' => $net_paid,  
                'bank_name' => $bank_name,             
                'translations' => $translations,
                'filters' => Req::all('search', 'trashed'),
             
                
                'net_list_by_banks' =>   Pay::query()
                ->where('pays.company_id', $this->company()->id)
                ->where('pays.pay_number', $max_pay)
                ->where('bank_id', $bank_id)
                ->join('employees', 'employees.id','pays.employee_id')
                ->join('users', 'users.id','employees.user_id')
                ->join('banks', 'banks.id','employees.bank_id')

                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($net_list_by_bank) => [
                             
                    'first_name' => $net_list_by_bank->first_name,
                    'last_name' => $net_list_by_bank->last_name,
                    'pay_number' => $net_list_by_bank->pay_number,
                    'employee_id' => $net_list_by_bank->employee_id,      
                    'account_number'  => $net_list_by_bank->account_number,             
                    'amount' => $net_list_by_bank->net,
                    'balance' => $net_list_by_bank->net_balance,
                    'paid' => $net_list_by_bank->net - $net_list_by_bank->net_balance,  
                    'deleted_at' => $net_list_by_bank->deleted_at,
                ])
    
           ]);   


  
              $net_list_by_banks = DB::table('pays')
  
              ->where('pays.company_id', $this->company()->id)
  
              ->where('pay_number', $max_pay)
  
              ->where('bank_id', $bank_id)
  
              ->join('employees', 'employees.id','pays.employee_id')
  
               ->join('banks', 'banks.id','employees.bank_id')
  
              ->join('users', 'users.id','employees.user_id')
  
              ->select(
  
                'users.*',
  
                'employees.*',
  
                'banks.name as bank_name',
  
                'pays.*'
                )
              ->get();
  
            
              return Inertia::render('reports/NetListByBank', compact( 'net_list_by_banks','bank_name','net_total','net_paid','net_balance','translations'));
      }
}
