<?php

namespace App\Http\Controllers;

use App\Models\Pay_statutory;



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

class PayStatutoryController extends Controller
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
    
            // $this->authorize('viewAny', Pay_statutory::class);
    
            return Inertia::render('PayStatutories/Index',  [
              'translations' => $translations,
              'filters' => Req::all('search', 'trashed'),          
              
              'pay_statutories' => Pay_statutory::query()->where('pay_statutories.company_id', $this->company()->id)
                  ->join('employees', 'employees.id','pay_statutories.employee_id')
                  ->join('users', 'users.id','employees.user_id')
                  ->join('statutories', 'statutories.id', 'pay_statutories.statutory_id')
                  
                  ->select(
                    'pay_statutories.id as id',
                    'users.first_name',
                    'users.last_name',
                    'pay_statutories.pay_number',
                    'pay_statutories.employee',
                    'pay_statutories.employer',
                    'pay_statutories.total as amount',
                    'statutories.name as allowance_name',
                    'pay_statutories.year',
                    'pay_statutories.month'
                    )
                   
                  ->orderByName()
                  ->filter(Req::only('search', 'trashed'))
                  ->paginate(10)
                  ->withQueryString()
                  ->through(fn ($pay_statutory) => [
                      'id' => $pay_statutory->id,              
                      'first_name' => $pay_statutory->first_name, 
                      'last_name' => $pay_statutory->last_name, 
                      'pay_number' => $pay_statutory->pay_number, 
                      'allowance_name' => $pay_statutory->allowance_name, 
                      'month' => $pay_statutory->month, 
                      'year' => $pay_statutory->year,
                      'employer' => $pay_statutory->employer, 
                      'employee' => $pay_statutory->employee,  
                      'amount' => $pay_statutory->amount,                
                      'deleted_at' => $pay_statutory->deleted_at,
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
     * @param  \App\Pay_statutory  $pay_statutory
     * @return \Illuminate\Http\Response
     */
    public function show(Pay_statutory $pay_statutory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pay_statutory  $pay_statutory
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay_statutory $pay_statutory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pay_statutory  $pay_statutory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay_statutory $pay_statutory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pay_statutory  $pay_statutory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay_statutory $pay_statutory)
    {
        //
    }
}
