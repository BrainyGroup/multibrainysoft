<?php

// TODO: Option and mandatory statutory
// TODO: List salary and salary history for employees
//// TODO: List allowance and deduction for employees
// TODO: list next of kin for employees
//// TODO: list statutory for employees

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\Bank;

use App\Models\Center;

use App\Models\Company;

use App\Models\Department;

use App\Models\Designation;

use App\Models\Employee;

use App\Models\PreviousStatutory;

use App\Models\Level;

use App\Models\Pay;

use App\Models\Salary;

use App\Models\Scale;

use App\Models\Statutory;

use App\Models\Statutory_type;

use App\Models\User;

use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request as Req;


class EmployeeController extends Controller
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

            $this->authorize('viewAny', Employee::class);
            
            $employeeExist = Employee::where('company_id', $this->company()->id)->exists();

            if (!$employeeExist) {

                return redirect('users')->withInput()->with('error', 'Please add at least one employee to view employees');

                return redirect()->route('users.index')

                ->with('error', 'Please add at least one employee to view employees');
            }

            // Log::debug($company->name . ': Start employee index');

            return Inertia::render('Employees/Index',  [
                'translations' => $translations,
                'filters' => Req::all('search', 'trashed'),
                'employees' => Employee::query()
                // ->join('salaries',  'employees.id', 'salaries.employee_id')           
                  ->where('company_id', $this->company()->id)
                    ->orderByIdentity()
                    ->filter(Req::only('search', 'trashed'))
                    ->paginate(10)
                    ->withQueryString()
                    ->through(fn ($employee) => [
                        'id' => $employee->id,  
                        'designation_name' => $employee->designation->name, 
                        'identity' => $employee->identity,                                     
                        'full_name' => $employee->user->first_name. ' ' . $employee->user->last_name,
                        'company_id' => $employee->company_id, 
                        'center_name' => $employee->center->name,
                        'department_name' => $employee->department->name,
                        'tin' => $employee->tin,
                        'account_number' => $employee->account_number, 
                        'bank_name' => $employee->bank->name,
                        'salary_amount' => $employee->salary->amount,
                        'start_date' => $employee->start_date,
                        'end_date' => $employee->end_date,
                        'deleted_at' => $employee->deleted_at,
                    ]),
               ]);  

        }catch(Exception $e){

            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

            // Log::info($this->company()->name.': End scale index');
    
            $errorTime = Carbon::now();
    
            return redirect()->back()
    
            ->with('error', $e->getMessage());
        }
                      




        

        // TODO: here you must fetch from user and use user id to fetch from employees see on user controller

        // $employee = Employee::where('user_id', auth()->user()->id)->first();

        // $allowances = DB::table('allowances')

        //     ->select(

        //         'employee_id',

        //         DB::raw('SUM(amount) as allowance_amount'))

        //     ->where('allowances.company_id', $this->company()->id)

        //     ->groupBy('employee_id');

        // $deductions = DB::table('deductions')

        //     ->select(

        //         'employee_id',

        //   DB::raw('SUM(balance) as deduction_amount'))

             

        //     ->where('deductions.company_id', $this->company()->id)

        //     ->groupBy('employee_id');

        // $employees = DB::table('employees')

        //     ->join('users', 'users.id', 'employees.user_id')

        //     ->join('salaries', 'employees.id', 'salaries.employee_id')

        //     ->join('centers', 'employees.center_id', '=', 'centers.id')

        //     ->join('designations', 'employees.designation_id', '=', 'designations.id')

        //     ->joinSub($allowances, 'allowances', function ($join) {

        //         $join->on('employees.id', 'allowances.employee_id');

        //     })

        //     ->joinSub($deductions, 'deductions', function ($join) {

        //         $join->on('employees.id', '=', 'deductions.employee_id');})

        //     ->select(

        //         'users.*',

        //         'employees.*',

        //         'salaries.amount as salary',

        //         'allowances.*',

        //         'deductions.*',

        //         'centers.name as center_name',

        //         'designations.name as designation',

        //         'centers.description as center_description'

        //     )

        //     ->get();

        // return view('employees.index', compact('employees'));

        //return view('employees.index')->with('employees', $employees);

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

        $this->authorize('create', Employee::class);

        $user = User::find(request('user_id'));

        // $user = User::find($id);

        $centers = Center::where('company_id', $this->company()->id )->get();

        $departments = Department::where('company_id', $this->company()->id )->get();

        $levels = Level::where('company_id', $this->company()->id)->get();

        $scales = Scale::where('company_id', $this->company()->id)->get();

        $banks = Bank::where('company_id', $this->company()->id)->get();

        $designations = Designation::where('company_id', $this->company()->id)->get();


        $statutories = Statutory::where('company_id', $this->company()->id)->get();

        return Inertia::render('Employees/Create', compact(
            'translations',
            'user',
            //'payroll_groups',
            //'pay_types',
            //'employment_types',
            'centers',
            'levels',
            'departments',
            'designations',
            'scales',          
            'statutories',
            'banks'
        ));

    }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End scale index');

        $errorTime = Carbon::now();

        return redirect()->back()

        ->with('error', $e->getMessage());
    }
         



       

        // $statutories = Statutory::where(

        //     'statutories.company_id', $this->company()->id)

        //     ->join('statutory_types', 'statutory_types.id', 'statutories.statutory_type_id')

        // // ->where('statutory_types.selected', true)

        //     ->select(

        //         'statutories.*',

        //         'statutory_types.*',

        //         'statutory_types.name as statutory_type_name',

        //         'statutories.name as statutory_name',

        //         'statutories.id as statutory_id'

        //     )

        //     ->get();

        // $selected_statutory_types = Statutory_type::where(

        //     'company_id', $this->company()->id
        // )
        // // ->where('selected', true)

        //     ->get();

        // $employeeExist = Employee::where('company_id', $this->company()->id)->exists();



        // return view('employees.create', compact(
        //     'user',
        //     //'payroll_groups',
        //     //'pay_types',
        //     //'employment_types',
        //     'centers',
        //     'levels',
        //     'departments',
        //     'designations',
        //     'scales',
        //     'selected_statutory_types',
        //     'statutories',
        //     'banks'
        // ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: add validation

        try{

        $this->authorize('create', Employee::class);

        $company = $this->company();

        $user = User::where('id', request('user_id'))

            ->where('company_id', $this->company()->id)->first();

        //$age = now()-$user->dob;

        $userExists = Employee::where('user_id', request('user_id'))

            ->where('company_id', $this->company()->id)

            ->exists();

        // TODO: check if user already on employee list of the company before adding

        if ($userExists) {

            return redirect('users')->with('error', 'User already exist as employee in this company');

        } else {

            // TODO:  work on employee store function is the taff one

            //update statutory table

            DB::transaction(function () use ($company, $user) {

                $user = User::find(request('user_id'));

                $dob = Carbon::parse($user->dob);

                $lastEmployeeId = DB::table('employees')->insertGetId([

                    'company_id' => $this->company()->id,

                    'center_id' => request('center_id'),

                    'department_id' => request('department_id'),

                    'designation_id' => request('designation_id'),

                    'start_date' => request('start_date'),

                    'end_date' => Carbon::parse($user->dob)->addYears(60),

                    'identity' => Employee::max('identity') + 1,

                    'department_id' => request('department_id'),

                    'user_id' => request('user_id'),

                    'tin' => request('tin'),

                    'bank_id' => request('bank_id'),

                    'account_number' => request('account_number'),

                    'created_at' => now(),

                    'updated_at' => now(),

                ]);

                // TODO: check to see if the employee exist
                // TODO: dispay error iinformation if something went wrong
                // TODO: work on all hard codede value in employee

                // DB::table('allowances')->insert([
                //     'amount' => 0.00,
                //     'employee_id' => $lastEmployeeId,
                //     'start_date' => now(),
                //     'end_date' => '3000-01-01',
                //     'company_id' => $this->company()->id,
                //     'allowance_type_id' => 1,
                //     'created_at' => now(),
                //     'updated_at' => now(),
                // ]);

                DB::table('salaries')->insert([
                    'company_id' => $this->company()->id,
                    'employee_id' => $lastEmployeeId,
                    'amount' => request('salary_amount'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            //     DB::table('deductions')->insert([
            //         'amount' => 0.00,
            //         'interest' => 0,
            //         'interest_amount' => 0,
            //         'date_taken' => now(),
            //         'period' => 0,
            //         'total_amount' => 0.00,
            //         'status' => 10,
            //         'balance' => 0,
            //         'monthly_amount' => 0.00,
            //         'employee_id' => $lastEmployeeId,
            //         'start_date' => now(),
            //         'end_date' => '3000-01-01',
            //         'company_id' => $this->company()->id,
            //         'deduction_type_id' => 1,
            //         'created_at' =>now(),
            //         'updated_at' =>now(),
            //   ]);    


            // Update user table that now user is employee


                DB::table('users')
                ->where('company_id', $this->company()->id)
                ->where('id', request('user_id'))
                ->update(['employee' => true]);

                // Get all mandatory statutories

                $statutories = Statutory::where(

                    'statutories.company_id', $this->company()->id)

                    ->where('statutories.selection', 0)       

                    ->select(

                        'statutories.*'
              
                        )

                    ->get();

                //dd( $statutories);

       

      // Create employee mandatory statutory

      foreach($statutories as $statutory){

        // dd( $statutory->organization_id);

        DB::table('employee_statutories')->insert([
                'employee_id' => $lastEmployeeId,
                'statutory_id' => $statutory->id, 
                'employee_statutory_no' => '', 
                'company_id' => $this->company()->id,
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);      
      }

      });

      return back()->with('success','Employee added successfully');
    }

}catch(Exception $e){

    Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

    // Log::info($this->company()->name.': End scale index');

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
    public function show(Employee $employee)
    {

        try{

                
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        // $this->authorize('view', $employee);

        $company = $this->company();  

        $user = User::find(auth()->user()->id);
        
        $can = [
            'create_remuneration' => $user->can('create', Remuneration::class),
            'create_allowance' => $user->can('create', Allowance::class),
            'create_deduction' => $user->can('create', Deduction::class),
            'create_next_of_kin' => $user->can('create', Kin::class),
            'create_previous_contribution' => $user->can('create', PreviousStatutory::class)

        ];

        $employeeExist = Employee::where('company_id', $this->company()->id)->exists();

        if (!$employeeExist) {

            return redirect('users')->withInput()->with('error', 'Please add at least one employee to view employees');
        }

        $allowances = DB::table('allowances')

            ->select(

                'employee_id',

                'allowance_type_id',

                DB::raw('SUM(amount) as allowance_amount'))

            ->where('allowances.company_id', $this->company()->id)

            ->where('allowances.employee_id', $employee->id)

          ->where('allowances.amount','>', 0)

          ->groupBy('employee_id')

          ->groupBy('allowance_type_id');

      

        $deductions = DB::table('deductions')

        ->select(

          'deduction_type_id','employee_id',

          DB::raw('SUM(balance) as deduction_amount'))

          ->where('deductions.company_id', $this->company()->id)

           ->where('deductions.employee_id', $employee->id)

           ->where('deductions.balance', '>', 0)

           ->groupBy('employee_id')

           ->groupBy('deduction_type_id');

        
           $remunerations = DB::table('remunerations')

           ->select(

               'employee_id',

               'remuneration_type_id',

               DB::raw('SUM(amount) as remuneration_amount'))

           ->where('remunerations.company_id', $this->company()->id)

           ->where('remunerations.employee_id', $employee->id)

         ->where('remunerations.amount','>', 0)

         ->groupBy('employee_id')

         ->groupBy('remuneration_type_id');



     $remuneration_types = DB::table('remuneration_types')

         ->joinSub($remunerations, 'remunerations', function ($join) {

             $join->on('remuneration_types.id', 'remunerations.remuneration_type_id');

         })

         ->select(

             'remunerations.*',

             'remuneration_types.name as remuneration_name'

         )->get();

        



        $allowance_types = DB::table('allowance_types')

            ->joinSub($allowances, 'allowances', function ($join) {

                $join->on('allowance_types.id', 'allowances.allowance_type_id');

            })

            ->select(

                'allowances.*',

                'allowance_types.name as allowance_name'

            )->get();

        // dd($allowance_types);

        $deduction_types = DB::table('deduction_types')

            ->joinSub($deductions, 'deductions', function ($join) {

                $join->on('deduction_types.id', 'deductions.deduction_type_id');

            })

            ->select(

                'deductions.*',

                'deduction_types.description as deduction_name'

            )->get();

            
        $employee = DB::table('employees')

            ->where('employees.id', $employee->id)

            ->join('users', 'users.id', 'employees.user_id')

            ->join('salaries', 'employees.id', 'salaries.employee_id')

            ->join('centers', 'employees.center_id', '=', 'centers.id')

            ->join('departments', 'employees.department_id', 'departments.id')

            ->join('banks', 'employees.bank_id', 'banks.id')

            ->join('designations', 'employees.designation_id', 'designations.id')

            ->join('scales', 'designations.scale_id', 'scales.id')

            ->join('levels', 'designations.level_id', 'levels.id')

            ->join('employment_types', 'scales.employment_type_id', 'employment_types.id')

            ->join('payroll_groups', 'scales.payroll_group_id', 'payroll_groups.id')

            ->join('pay_bases', 'scales.pay_base_id', 'pay_bases.id')

            ->select(

                'users.*',

                'employees.*',

                'salaries.amount as salary',

                'centers.name as center_name',

                'departments.name as department_name',

                'banks.name as bank_name',

                'scales.name as scale_name',

                'employment_types.name as employment_type_name',

                'pay_bases.name as pay_base_name',

                'payroll_groups.name as payroll_group_name',

                'scales.description as scale_description',

                'levels.description as level_description',

                'designations.name as designation_name',

                'designations.description as designation_description',

                'centers.description as center_description'

            )

            ->first();

            

        $kins = DB::table('kin')

            ->where('kin.company_id', $this->company()->id)

           

            ->where('employee_id', $employee->id)

            ->join('employees', 'employees.id', 'kin.employee_id')

            ->join('kin_types', 'kin_types.id', 'kin.kin_type_id')

            ->select(

                'employees.*',

                'kin.*',

                'kin_types.name as kin_type_name'

            )

            ->get();

        $statutories = DB::table('employee_statutories')

            ->where('employee_statutories.company_id', $this->company()->id)

            ->where('employee_statutories.employee_id', $employee->id)

            ->join('statutories', 'statutories.id', 'employee_statutories.statutory_id')

            ->join('organizations', 'organizations.id', 'statutories.organization_id')

            ->join('salary_bases', 'salary_bases.id', 'statutories.base_id')

            ->join('statutory_types', 'statutory_types.id', '=', 'statutories.statutory_type_id')

            ->select(

                'employee_statutories.*',

                'statutories.*',

                'organizations.name as organization_name',

                'salary_bases.name as salary_base',

                'statutory_types.name as statutory_type_name',

                'employee_statutories.id as employee_statutory_id'

            )

            ->get();

            

        //    dd($statutories);

          
        return Inertia::render('Employees/Show', compact('translations','employee', 'allowance_types','can', 'deduction_types','remuneration_types', 'kins', 'statutories'));

        // return view('employees.show', compact('employee', 'allowance_types', 'deduction_types', 'kins', 'statutories'));
    }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End scale index');

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
    public function edit(Employee $employee)
    {

        try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('update', $employee);

        $user = User::find($employee->user_id);

        // $user = User::find($id);
        // dd($employee);

        $centers = Center::where('company_id', $this->company()->id )->get();

        $departments = Department::where('company_id', $this->company()->id )->get();

        $levels = Level::where('company_id', $this->company()->id)->get();

        $scales = Scale::where('company_id', $this->company()->id)->get();

        $banks = Bank::where('company_id', $this->company()->id)->get();

        $designations = Designation::where('company_id', $this->company()->id)->get();


        $salary = Salary::where('company_id', $this->company()->id)
                               ->where('employee_id', $employee->id)
        ->first();

        // dd($salary);


        $statutories = Statutory::where('company_id', $this->company()->id)->get();

        return Inertia::render('Employees/Edit', compact(
            'translations',
            'user',
            'employee',
            //'payroll_groups',
            //'pay_types',
            //'employment_types',
            'centers',
            'levels',
            'departments',
            'designations',
            'scales',          
            'statutories',
            'banks',
            'salary'
        ));

    }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End scale index');

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
    public function update(Request $request, Employee $employee)
    {

        // dd($employee);

        // TODO: update all item related to this employee
        //Validation
        // $this->validate(request(), [

        //     // 'payroll_group_id' =>'required|string',

        //     'center_id' => 'required|string',

        // ]);

        try{

        $this->authorize('update', $employee);

        DB::transaction(function () {

            DB::table('employees')

                ->where('company_id', $this->company()->id)

                ->where('id', request('employee_id'))->update([

                // 'payroll_group_id' => request('payroll_group_id'),

                'center_id' => request('center_id'),

                'department_id' => request('department_id'),

                'designation_id' => request('designation_id'),

                'bank_id' => request('bank_id'),

                'account_number' => request('account_number'),

                'updated_at' => now(),

            ]);

            DB::table('salaries')
                ->where('company_id', $this->company()->id)
                ->where('employee_id', request('employee_id'))->update([
                'amount' => request('salary_amount'),
                'updated_at' => now(),
            ]);

        });

        return redirect()->back()

            ->with('success', 'Employee updated successfully');

        }catch(Exception $e){

            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

            // Log::info($this->company()->name.': End scale index');
    
            $errorTime = Carbon::now();
    
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
    public function destroy(Employee $employee)
    {

        //// TODO: delete all item related to employee

        try{

        $this->authorize('delete', $employee);

        $employee_exist = Pay::where('employee_id', $employee->id)->exists();

        if (!$employee_exist) {

            DB::transaction(function () use ($employee) {

                DB::table('employees')
                    ->where('id', $employee->id)
                    ->delete();

                DB::table('allowances')
                    ->where('employee_id', $employee->id)
                    ->delete();

                DB::table('deductions')
                    ->where('employee_id', $employee->id)
                    ->delete();

                DB::table('salaries')
                    ->where('employee_id', $employee->id)
                    ->delete();

                DB::table('employee_statutories')
                    ->where('employee_id', $employee->id)
                    ->delete();

            });

            return redirect('employees')

                ->with('success', 'Employee deleted successfully');

        } 

    }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End scale index');

        $errorTime = Carbon::now();

        return redirect()->back()

        ->with('error', $e->getMessage());
    }
         




    }
}
