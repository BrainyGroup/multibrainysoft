<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Company;

use App\Models\Employee;

use Inertia\Inertia;

use Inertia\Response;

use Illuminate\Support\Facades\Request as Req;



class EmployeePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    }
    private function company()
    {
        $user = User::find(auth()->user()->id);

        return Company::find($user->company_id);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $locale = app()->getLocale();
  
        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
       
      

        $employee_id = request('employee_id');
        $pay_number = request('pay_number');
        $employee_balance = request('employee_balance');

        $employee = Employee::find($employee_id);

        $user = User::find($employee->user_id);

        $bank_id = $employee->bank_id;

        $first_name = $user->first_name;

        $last_name = $user->last_name;
      
        return Inertia::render('EmployeePayments/Create', compact('employee_id','bank_id','pay_number','employee_balance','first_name','last_name','translations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
           
          try{

            if( request('balance') >= request('paid') ){            
               


                DB::transaction(function () {
                    $this->validate(request(),[
              
                      'paid' =>'required|string', 
              
                    ]); 

                    $balance_new = request('balance') - request('paid');

                    $company = $this->company();

                    $pay_number = request('pay_number');

                   
        
                    $year = substr($pay_number, 0, 4);
        
        
                    $month = substr($pay_number, 4, 2);

                DB::table('employee_payment_history')->insert([
                    'company_id' => $company->id,      
                    'pay_number' =>  $pay_number,
                    'employee_id' =>  request('employee_id'),
                    'amount' =>   request('paid'),
                    'month' =>   $month, 
                    'year'  =>  $year,
                    "pay_date" => now(),               
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ]);

                DB::table('pays')              
                ->where('company_id', $company->id)
                ->where('pay_number',  $pay_number)   
                ->where('employee_id', request('employee_id'))             
            
                ->update([
                          'net_balance' => $balance_new,
                          'updated_at' => now()]);
                  });

               


                  return redirect()->action(
                    [PayController::class, 'netListByBank'], ['max_pay' => request('pay_number'), 'bank_id'=> request('bank_id')]
                );


              }
              else{
                $balance_new = request('balance');
                return back()->with('error','Please enter paid amount less than or equeal to balance');
              }  
              
            }catch(Exception $e){

                Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
    
                $errorTime = Carbon::now();        
    
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
