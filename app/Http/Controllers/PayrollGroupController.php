<?php

namespace App\Http\Controllers;


use App\Models\User;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\Company;

use Illuminate\Http\Request;

use App\Models\Payroll_group;

use App\Http\Requests\StorePayrollGroupRequest;

use App\Http\Requests\UpdatePayrollGroupRequest;

class PayrollGroupController extends Controller
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
        //
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

        $this->authorize('create', Payroll_group::class);

    
         //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $company = $this->company();

      $payroll_group = new Payroll_group;

      $payroll_group->name = request('name');

      $payroll_group->description = request('description');

      $payroll_group->company_id = $company->id;

      $payroll_group->save();

      return back()->with('success','Payroll group added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function show(payroll_group $payroll_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function edit(payroll_group $payroll_group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payroll_group $payroll_group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(payroll_group $payroll_group)
    {
        //
    }
}
