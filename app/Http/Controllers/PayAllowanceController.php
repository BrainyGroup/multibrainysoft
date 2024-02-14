<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Pay_allowance;

use App\Models\User;

use App\Models\Company;

use App\Models\Employee;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request as Req;

use Inertia\Inertia;

use Inertia\Response;

class PayAllowanceController extends Controller
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
    
            $this->authorize('viewAny', Pay_allowance::class);
    
            return Inertia::render('PayAllowances/Index',  [
              'translations' => $translations,
              'filters' => Req::all('search', 'trashed'),          
              
              'pay_allowances' => Pay_allowance::query()->where('pay_allowances.company_id', $this->company()->id)
                  ->join('employees', 'employees.id','pay_allowances.employee_id')
                  ->join('users', 'users.id','employees.user_id')
                  ->join('allowance_types', 'allowance_types.id', 'pay_allowances.allowance_type_id')
                  
                  ->select(
                    'pay_allowances.id as id',
                    'users.first_name',
                    'users.last_name',
                    'pay_allowances.pay_number',
                    'pay_allowances.amount',
                    'allowance_types.name as allowance_name',
                    'pay_allowances.year',
                    'pay_allowances.month'
                    )
                   
                  ->orderByName()
                  ->filter(Req::only('search', 'trashed'))
                  ->paginate(10)
                  ->withQueryString()
                  ->through(fn ($pay_allowance) => [
                      'id' => $pay_allowance->id,              
                      'first_name' => $pay_allowance->first_name, 
                      'last_name' => $pay_allowance->last_name, 
                      'pay_number' => $pay_allowance->pay_number, 
                      'allowance_name' => $pay_allowance->allowance_name, 
                      'month' => $pay_allowance->month, 
                      'year' => $pay_allowance->year, 
                      'amount' => $pay_allowance->amount,                
                      'deleted_at' => $pay_allowance->deleted_at,
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
     * @param  \App\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function show(Pay_allowance $pay_allowance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay_allowance $pay_allowance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay_allowance $pay_allowance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay_allowance $pay_allowance)
    {
        //
    }
}
