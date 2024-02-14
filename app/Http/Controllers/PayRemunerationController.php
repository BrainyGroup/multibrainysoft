<?php

namespace App\Http\Controllers;

use App\Models\PayRemuneration;



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

class PayRemunerationController extends Controller
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
    
            // $this->authorize('viewAny', PayRemuneration::class);
    
            return Inertia::render('PayRemunerations/Index',  [
              'translations' => $translations,
              'filters' => Req::all('search', 'trashed'),          
              
              'pay_remunerations' => PayRemuneration::query()->where('pay_remunerations.company_id', $this->company()->id)
                  ->join('employees', 'employees.id','pay_remunerations.employee_id')
                  ->join('users', 'users.id','employees.user_id')
                  ->join('remuneration_types', 'remuneration_types.id', 'pay_remunerations.remuneration_type_id')
                  
                  ->select(
                    'pay_remunerations.id as id',
                    'users.first_name',
                    'users.last_name',
                    'pay_remunerations.pay_number',
                    'pay_remunerations.amount',
                    'remuneration_types.name as allowance_name',
                    'pay_remunerations.year',
                    'pay_remunerations.month'
                    )
                   
                  ->orderByName()
                  ->filter(Req::only('search', 'trashed'))
                  ->paginate(10)
                  ->withQueryString()
                  ->through(fn ($pay_remuneration) => [
                      'id' => $pay_remuneration->id,              
                      'first_name' => $pay_remuneration->first_name, 
                      'last_name' => $pay_remuneration->last_name, 
                      'pay_number' => $pay_remuneration->pay_number, 
                      'allowance_name' => $pay_remuneration->allowance_name, 
                      'month' => $pay_remuneration->month, 
                      'year' => $pay_remuneration->year, 
                      'amount' => $pay_remuneration->amount,                
                      'deleted_at' => $pay_remuneration->deleted_at,
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
     * @param  \App\PayRemuneration  $payremuneration
     * @return \Illuminate\Http\Response
     */
    public function show(PayRemuneration $pay_remuneration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PayRemuneration  $pay_remuneration
     * @return \Illuminate\Http\Response
     */
    public function edit(PayRemuneration $pay_remuneration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PayRemuneration  $pay_remuneration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayRemuneration $pay_remuneration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PayRemuneration  $pay_remuneration
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayRemuneration $pay_remuneration)
    {
        //
    }
}
