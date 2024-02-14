<?php

namespace App\Http\Controllers;

use App\Models\Pay_deduction;



use Inertia\Inertia;

use Inertia\Response;

use Exception;

use App\Models\User;

use App\Models\Company;

use App\Models\Employee;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PayDeductionController extends Controller
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
        try{

            $locale = app()->getLocale();
    
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    
            // $this->authorize('viewAny', Pay_deduction::class);
    
            return Inertia::render('PayDeductions/Index',  [
              'translations' => $translations,
              'filters' => Req::all('search', 'trashed'),          
              
              'pay_deductions' => Pay_deduction::query()->where('pay_deductions.company_id', $this->company()->id)
                  ->join('employees', 'employees.id','pay_deductions.employee_id')
                  ->join('users', 'users.id','employees.user_id')
                  ->join('deduction_types', 'deduction_types.id', 'pay_deductions.deduction_type_id')
                  
                  ->select(
                    'pay_deductions.id as id',
                    'users.first_name',
                    'users.last_name',
                    'pay_deductions.pay_number',
                    'pay_deductions.amount',
                    'deduction_types.name as allowance_name',
                    'pay_deductions.year',
                    'pay_deductions.month'
                    )
                   
                  ->orderByName()
                  ->filter(Req::only('search', 'trashed'))
                  ->paginate(10)
                  ->withQueryString()
                  ->through(fn ($pay_deduction) => [
                      'id' => $pay_deduction->id,              
                      'first_name' => $pay_deduction->first_name, 
                      'last_name' => $pay_deduction->last_name, 
                      'pay_number' => $pay_deduction->pay_number, 
                      'allowance_name' => $pay_deduction->allowance_name, 
                      'month' => $pay_deduction->month, 
                      'year' => $pay_deduction->year, 
                      'amount' => $pay_deduction->amount,                
                      'deleted_at' => $pay_deduction->deleted_at,
                  ]),
             ]);  

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function show(Pay_deduction $pay_deduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay_deduction $pay_deduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay_deduction $pay_deduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay_deduction $pay_deduction)
    {
        //
    }
}
