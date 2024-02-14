<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

use Exception;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\User;

use App\Models\Company;

use App\Models\Statutory;

use App\Models\Employee;

use App\Models\Salary_base;

use App\Models\Organization;

use Illuminate\Http\Request;

use App\Models\Statutory_type;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\StoreStatutoryRequest;

use App\Http\Requests\UpdateStatutoryRequest;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Controllers\Controller;

use Carbon\Carbon;




class StatutoryController extends Controller
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

      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('viewAny', Statutory::class);

        return Inertia::render('Statutories/Index',  [
          'translations' => $translations,
          'filters' => Req::all('search', 'trashed'), 
          'can' => ['create_statutory' => $request->user()->can('create', Statutory::class)],         
          
          'statutories' => Statutory::query()->where('statutories.company_id', $this->company()->id)
              ->join('organizations', 'organizations.id','statutories.organization_id')
              ->join('salary_bases','salary_bases.id', 'statutories.base_id')  
              ->join('statutory_types', 'statutory_types.id', '=', 'statutories.statutory_type_id')
  
              ->select(
                'statutories.*',

                'organizations.name as organization_name',
      
                'salary_bases.name as salary_base',
      
                'statutory_types.name as statutory_type_name'
                
                )
               
              ->orderByName()
              ->filter(Req::only('search', 'trashed'))
              ->paginate(10)
              ->withQueryString()
              ->through(fn ($statutory) => [
                  'id' => $statutory->id,
                  'company_id' => $statutory->company_id,                  
                  'name' => $statutory->name, 
                  'description' => $statutory->description, 
                  'organization_name' => $statutory->organization_name, 
                  'salary_base' => $statutory->salary_base, 
                  'before_paye' => $statutory->before_paye? 'Yes' : 'No', 
                  'statutory_type_name' => $statutory->statutory_type_name, 
                  'selection' => $statutory->selection? 'No' : 'Yes',   
                  'employee_ratio' => $statutory->employee,   
                  'employer_ratio' => $statutory->employer, 
                  'due_date' => $statutory->date_required,            
                  'deleted_at' => $statutory->deleted_at,
              ]),
         ]); 



      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End statutory index');

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

      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('create', Statutory::class);


        $organizations = Organization::all();

        $salary_bases = Salary_base::all();

        $statutory_types = Statutory_type::all();

        return Inertia::render('Statutories/Create', compact('organizations', 'salary_bases', 'statutory_types','translations'));

        
      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        // Log::info($this->company()->name.': End bank index');

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
    public function store(StoreStatutoryRequest $request)
    {

      try{  

        
        // Log::info($this->company()->name.': Start allowance store');

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('create', Statutory::class);

   
        
        $request['company_id'] = $this->company()->id;

        //TODO make sure it is number

        $request['total'] =  $request['employee'] +  $request['employer'] ;

        $statutory = Statutory::create($request->all());

        Log::debug($this->company()->name.': statutory created successful');

        // Log::info($this->company()->name.': End bank store');

        return redirect()->route('statutories.index')

        ->with('success', $translations['item created succssfully']);

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();;

        // Log::info($this->company()->name.': End bank store');

        return redirect()->back()

        ->with('error', $e->getMessage());

      }




      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

        'organization_id' =>'required|numeric',

        'statutory_type_id' => 'required|numeric',

        'salary_base_id' =>'required|numeric',

        'employee_ratio' => 'required|numeric',

        'employer_ratio' =>'required|numeric',

        'mandatory' => 'required|boolean',

        'mandatory' =>'required|boolean',

        'due_date' =>'required|date',

      ]);

      $company = $this->company();;

      $statutory = new Statutory;

      $statutory->name = request('name');

      $statutory->description = request('description');

      $statutory->organization_id = request('organization_id');

      $statutory->statutory_type_id = request('statutory_type_id');

      $statutory->base_id = request('salary_base_id');

      $statutory->employee = request('employee_ratio');

      $statutory->employer = request('employer_ratio');

      $statutory->before_paye = request('before_paye');

      $statutory->date_required = request('due_date');

      $statutory->selection = request('selection');

      $statutory->mandatory = request('mandatory');

      $statutory->total = $statutory->employee + $statutory->employer;

      $statutory->company_id = $company->id;

      $statutory->save();

      return redirect('statutories');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Statutory $statutory)
    {
        return view('statutories.show',compact('statutory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Statutory $statutory)
    {

      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('update', $statutory);

        $current_organization = Organization::find($statutory->organization_id);

        $current_salary_base = Salary_base::find($statutory->base_id);

        $current_before_paye = $statutory->before_paye;

        $current_statutory_type = Statutory_type::find($statutory->statutory_type_id);

        $organizations = Organization::all();

        $salary_bases = Salary_base::all();

        $statutory_types = Statutory_type::all();

        return Inertia::render('Statutories/Edit',compact(
          'statutory',
          'current_salary_base',
          'current_before_paye',
          'current_organization',
          'current_statutory_type',
          'organizations',
          'salary_bases',
          'statutory_types',
          'translations'
        ));

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();;

        // Log::info($this->company()->name.': End bank store');

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
    public function update(UpdateStatutoryRequest $request, Statutory $statutory)
    {

      try{

        // Log::info($this->company()->name.': Start bank update');
 
        $locale = app()->getLocale();
 
        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
 
        $this->authorize('update', $statutory);
 
         $request['updated_by'] =  auth()->user()->id;
 
         $statutory->update($request->all());
 
         // Log::info($this->company()->name.': End bank store');
 
         return redirect()->route('statutories.index')
         
         ->with('success', $translations['item updated successfully'] );
 
       }catch(Exception $e){
 
         Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
 
         $errorTime = Carbon::now();  
 
         // Log::info($this->company()->name.': End bank update');
 
         return redirect()->back()
 
         ->with('error', $e->getMessage());
       }
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

        'organization_id' =>'required|numeric',

        'statutory_type_id' => 'required|numeric',

        'salary_base_id' =>'required|numeric',

        'employee_ratio' => 'required|numeric',

        'employer_ratio' =>'required|numeric',

        'due_date' =>'required|date',
      ]);

      $statutoryUpdate = Statutory::where('id', $statutory->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

          'organization_id'			=>$request->input('organization_id'),

          'statutory_type_id'	=>$request->input('statutory_type_id'),

          'base_id'			=>$request->input('salary_base_id'),

          'employee'	=>$request->input('employee_ratio'),

          'employer'			=>$request->input('employer_ratio'),

          'total' => $request->input('employee_ratio') + $request->input('employer_ratio'),


          'before_paye'			=>$request->input('before_paye'),

          'date_required'	=>$request->input('due_date'),

      ]);

      if($statutoryUpdate)

        return redirect('statutories')

        ->with('success','Statutory updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statutory $statutory)
    {
      


      // $pay_statutory_exist = Employee::where('bank_id',$bank->id)->exists();


      if ($statutory->delete()){

        return redirect('statutories')

        ->with('success','Statutory deleted successfully');

      }else{

        return back()->withInput()->with('error','Statutory could not be deleted');

      }
    }
}
