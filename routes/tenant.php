<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BankController;

use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\Deductiontroller;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeePaymentController;
use App\Http\Controllers\KinController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\StatutoryController;

use App\Http\Controllers\AllowanceTypeController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DeductionTypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmploymentTypeController;
use App\Http\Controllers\KinTypeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PayeController;
use App\Http\Controllers\PayBaseController;

use App\Http\Controllers\PayDeductionController;
use App\Http\Controllers\PayAllowanceController;

use App\Http\Controllers\PayStatutoryController;

use App\Http\Controllers\ScaleController;
use App\Http\Controllers\StatutoryTypeController;
use App\Http\Controllers\RemunerationTypeController;
use App\Http\Controllers\RemunerationController;
use App\Http\Controllers\PayRemunerationController;
use App\Http\Controllers\PreviousStatutoryController;
use App\Http\Controllers\SalaryBaseController;
use App\Http\Controllers\StatutoryPaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;


use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomainOrSubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    // Route::get('/dashboard', function () {
    //     $locale = app()->getLocale();

    //     $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    //     return Inertia::render('Dashboard', compact('translations'));
    
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::match(['put', 'patch'], '/pays/update/{id}', [PayController::class, 'post'])->name('pays.post');
        Route::get('/pays/pay_details', [PayController::class, 'payDetails'])->name('pays.pay_details');
        Route::get('/pays/nets', [PayController::class, 'net'])->name('pays.nets');
        Route::get('/pays/pay_slip', [PayController::class, 'downloadPDF'])->name('pays.pay_slip');
        Route::get('/pays/statutory_list', [PayController::class, 'statutoryList'])->name('pays.statutory_list');
        Route::get('/pays/net_by_bank', [PayController::class, 'netByBank'])->name('pays.net_by_bank');
        Route::get('/pays/net_list_by_bank', [PayController::class, 'netListByBank'])->name('pays.net_list_by_bank');
        Route::get('/pays/slip_download', [PayController::class, 'downloadPDF'])->name('pays.slip_download');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'roles' => RoleController::class,
            'users' => UserController::class,


            'allowances' => AllowanceController::class,
            'deductions' => DeductionController::class,
            'documentations' => DocumentationController::class,
            'employees' => EmployeeController::class,
            'kins' => KinController::class,
            'pays' => PayController::class,
            'salaries' => SalaryController::class,
            'statutories' => StatutoryController::class,
           

            

            

            'allowance_types' => AllowanceTypeController::class,
            'banks' => BankController::class,
            'centers' => CenterController::class,
            'countries' => CountryController::class,
            'companies' => CompanyController::class,

            


            'deduction_types' => DeductionTypeController::class,

            'departments' => DepartmentController::class,
            'designations' => DesignationController::class,
            'employment_types' => EmploymentTypeController::class,
            'employee_payments' => EmployeePaymentController::class,
           
            'kin_types' => KinTypeController::class,
            'levels' => LevelController::class,
            'organizations' => OrganizationController::class,

            'payes' => PayeController::class,
            'pay_bases' => PayBaseController::class,
            'scales' => ScaleController::class,
            'statutory_types' => StatutoryTypeController::class,
           
            'salary_bases' => SalaryBaseController::class,


            'pay_remunerations' => PayRemunerationController::class,

            'pay_statutories' => PayStatutoryController::class,
            'pay_deductions' => PayDeductionController::class,
            'pay_allowances' => PayAllowanceController::class,
            

            'earnings' => PayController::class,
            // 'reports' => ReportController::class,

            'remuneration_types' => RemunerationTypeController::class,
            'remunerations' => RemunerationController::class,
            'pay_remuneration' => PayRemunerationController::class,
            'previous_statutories' => PreviousStatutoryController::class,


            'help' => DocumentationController::class,
            
        ]);

       

        //Reports

            Route::get('/reports/pay_details', [ReportController::class, 'payDetails'])->name('pays.pay_details');

            Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        
            Route::get('/reports/net', [ReportController::class, 'net'])->name('reports.net');

            Route::get('/reports/net_by_bank', [ReportController::class, 'netByBank'])->name('reports.net_by_bank');

           
            
            Route::get('/current_pay', [ReportController::class, 'currentPay'])->name('reports.current_pay');
            
            
            Route::get('/reports/monthly_create', [ReportController::class, 'monthlyCreate'])->name('reports.monthly_create');
            Route::get('/reports/statutory_list', [ReportController::class, 'statutoryList'])->name('reports.statutory_list');
            Route::get('/reports/net_list_by_bank', [ReportController::class, 'netListByBank'])->name('reports.net_list_by_bank');
            Route::get('/reports/create_user', [ReportController::class, 'createUser'])->name('reports.create_user');
            Route::get('/reports/index_user', [ReportController::class, 'indexUser'])->name('reports.index_user');
            Route::get('/reports/employee_pay', [ReportController::class, 'pay_by_employee'])->name('reports.employee_pay');
            Route::get('/reports/monthly_summary', [ReportController::class, 'monthly_summary'])->name('reports.monthly_summary');
            Route::get('/reports/monthly_create', [ReportController::class, 'monthlyCreate'])->name('reports.monthly_create');
            Route::get('/reports/yearly_create', [ReportController::class, 'yearlyCreate'])->name('reports.yearly_create');
            Route::get('/reports/yearly_pay', [ReportController::class, 'yearly_pay'])->name('reports.yearly_pay');
            Route::get('/reports/paye_yearly_create', [ReportController::class, 'paye_yearly_create'])->name('reports.paye_yearly_create');
            Route::get('/reports/paye_yearly', [ReportController::class, 'paye_yearly'])->name('reports.paye_yearly');
            Route::get('/reports/paye_all', [ReportController::class, 'paye_all'])->name('reports.paye_all');
            Route::get('/reports/paye', [ReportController::class, 'paye'])->name('reports.paye');
            Route::get('/reports/statutory_yearly_create', [ReportController::class, 'statutory_yearly_create'])->name('reports.statutory_yearly_create');
            Route::get('/reports/statutory_yearly', [ReportController::class, 'statutory_yearly'])->name('reports.statutory_yearly');
            Route::get('/reports/statutory_all_create', [ReportController::class, 'statutory_all_create'])->name('reports.statutory_all_create');
            Route::get('/reports/statutory_all', [ReportController::class, 'statutory_all'])->name('reports.statutory_all');
            Route::get('/reports/statutory_employee_all_create', [ReportController::class, 'statutory_employee_all_create'])->name('reports.statutory_employee_all_create');
            Route::get('/reports/statutory_employee_all', [ReportController::class, 'statutory_employee_all'])->name('reports.statutory_employee_all');

            Route::get('/statutory_payments/create', [StatutoryPaymentController::class, 'create']);
            Route::post('/statutory_payments', [StatutoryPaymentController::class,'store'])->name('statutory_payments.store');






          



          







            //Route::resource('/reports/users', 'Payroll\UsersController');

            //Route::resource('/reports/pays', 'Payroll\PaysController');

            
            // Route::get('/employee_payments/create', 'EmployeePaymentController@create');

            // Route::post('/employee_payments', 'EmployeePaymentController@store');

   

 

    });

    //Enable this on production only

    // Route::fallback(function () {
    //     return redirect('/');
    // });



    require __DIR__.'/auth.php';
});




