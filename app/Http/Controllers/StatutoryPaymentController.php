<?php

namespace App\Http\Controllers;

use Exception;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\Company;

use App\Models\Statutory;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StatutoryPaymentController extends Controller
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

        try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('create', StatutoryPayment::class);  

        $company = $this->company();

        $company_id = $company->id;

        $statutory_balance = request('statutory_balance');

        $statutory_id = request('statutory_id');

        $max_pay = request('pay_number');

     

        if($statutory_id == 9999){
            $statutory_name = "PAYE";
        }else{
            $statutory_name = Statutory::where('id',$statutory_id)->value('name');
        }   
        
        // dd($statutory_id);


        return Inertia::render('StatutoryPayments/Create',compact('statutory_balance','statutory_id','max_pay','statutory_name','translations'));

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
    public function store(Request $request)
    {
        try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    
        $this->authorize('create', StatutoryPayment::class);  
        
        //Validation

        if( request('balance') >= request('paid') ){ 

        DB::transaction(function () {

        $this->validate(request(),[

            'paid' =>'required|string', 

        ]);     

      

        DB::table('statutory_payment_history')->insert([
        'company_id' =>  $this->company()->id,      
        'pay_number' => request('pay_number'),
        'statutory_id' =>  request('statutory_id'),
        'amount' =>   request('paid'),
        'month' =>   substr(request('pay_number'), 4, 2),
        'year'  =>  substr(request('pay_number'), 0, 4),
        "pay_date" => now(),               
        'created_at' =>now(),
        'updated_at' =>now(),
    ]);

    $balance_new = request('balance') - request('paid');


    DB::table('statutory_payments')              
    ->where('company_id', $this->company()->id)
    ->where('pay_number', request('pay_number'))   
    ->where('statutory_id', request('statutory_id'))             

    ->update([
              'balance' => $balance_new,
              'updated_at' => now()]);
      });

      //return back()->with('success','Kin added successfully');


      //return redirect()->route('pays');

        return redirect('pays');

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
