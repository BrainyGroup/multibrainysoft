<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Exception;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\Kin;

use App\Models\User;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Kin_type;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreKinRequest;



class KinController extends Controller
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
    public function index(Request $request)
    {


        $company = $this->company();

        Log::debug($company->name.': Start kin index');        

        $kins = DB::table('kin')

        ->where('kin.company_id', $company->id)

        ->where('employee_id',request('employee_id'))

        ->join('employees','employees.id','kin.employee_id')

        ->join('users','users.id','employees.user_id')



        ->join('kin_types','kin_types.id','kin.kin_type_id')

        ->select(

          'employees.*',

          'users.*',

          'kin.*',

          'kin_types.name as kin_type_name'

          )

        ->get();

        return view('kins.index', compact('kins','users'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $this->authorize('create', Kin::class);

        $employee = Employee::find(request('employee_id'));

        $user = User::where('id', $employee->user_id)->first();

        $kin_types = Kin_type::all();

        return view('kins.create', compact('user','kin_types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->authorize('create', Kin::class);

      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'mobile' => 'required|string',

        'kin_type_id' =>'required|numeric',

        'employee_id' => 'required|numeric',

      ]);

      

      $company = $this->company();

      $kin = new Kin;

      $kin->name = request('name');

      $kin->mobile = request('mobile');

      $kin->kin_type_id = request('kin_type_id');

      $kin->employee_id = request('employee_id');

      $kin->company_id = $company->id;

      $kin->save();

      //return back()->with('success','Kin added successfully');


      return redirect()->route('kins.index',['employee_id' => request('employee_id')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function show(Kin $kin)
    {
        $this->authorize('view', $kin);

        return view('kins.show',compact('kin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function edit(Kin $kin)
    {
        $this->authorize('update', $kin);

        $kin_types = Kin_type::all();

        $current_kin_type = Kin_type::find($kin->kin_type_id);

        return view('kins.edit',compact('kin','current_kin_type','kin_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kin $kin)
    {

      $this->authorize('update', $kin);
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'mobile' => 'required|string',

        'kin_type_id' =>'required|numeric',



      ]);

      $kinUpdate = Kin::where('id', $kin->id)

      ->update([

          'name'			=>$request->input('name'),

          'mobile'	=>$request->input('mobile'),

          'kin_type_id'			=>$request->input('kin_type_id'),





      ]);

      if($kinUpdate)

      return redirect()->route('kins.index',['employee_id' => $kin->employee_id])

        ->with('success','Kin updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kin $kin)
    {

      $this->authorize('delete', $kin);


      if ($kin->delete()){

      return redirect()->route('kins.index',['employee_id' => $kin->employee_id])

        ->with('success','Kin deleted successfully');

      }else{

        return back()->withInput()->with('error','Kin could not be deleted');

      }
    }
}
