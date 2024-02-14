<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use App\Models\Tenant;

use Inertia\Response;

use App\Models\User;

use App\Models\Center;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests\StoreCenterRequest;

use App\Http\Requests\UpdateCenterRequest;

use Carbon\Carbon;



use App\Http\Controllers\Controller;



class CenterController extends Controller
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
      //TODO identify tenant and put it in log and audit trail
      //TODO refactor and use event for log and audit trail
     try{    

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('viewAny', Center::class);
          // Log::info($this->company()->name.': Start center index');

          return Inertia::render('Centers/Index',  [
            'translations' => $translations,
            'filters' => Req::all('search', 'trashed'),
            'can' => ['create_center' => $request->user()->can('create', Center::class)],
            'centers' => Center::query()->where('company_id', $this->company()->id)
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($center) => [
                    'id' => $center->id,
                    'number' => $center->number,
                    'name' => $center->name,
                    'description' => $center->description,                 
                    'deleted_at' => $center->deleted_at,
                ]),
           ]);        

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          // Log::info($this->company()->name.': End center index');

          $errorTime = Carbon::now();

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

        $this->authorize('create', Center::class);

        return Inertia::render('Centers/Create', compact('translations'));

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
    public function store(StoreCenterRequest $request)
    {
      //get user id

      try{

          // Log::info($this->company()->name.': Start center store');

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

          $this->authorize('create', Center::class);

          $request['created_by'] =  auth()->user()->id;

          $request['country_id'] =  $this->company()->country_id;     
          

          $request['company_id'] = $this->company()->id;    

          $center= Center::create($request->all());    

          Log::debug($this->company()->name.': Center created successful');

          // Log::info($this->company()->name.': End center store');

          return redirect()->route('centers.index')
          
          ->with('success', $translations['item created succssfully']);
          
        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          $errorTime = Carbon::now();;

          // Log::info($this->company()->name.': End center store');

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
    public function show(Center $center)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('view', $center);

          return Inertia::render('Centers/Show',compact('center'));

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          $errorTime = Carbon::now();        

          return redirect()->back()

          ->with('error', $translations['page can not be displayed']. ' - '  . $errorTime->toDateTimeString());

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {    

        try{

          $locale = app()->getLocale();

          $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
        
          $this->authorize('update', $center);

          return Inertia::render('Centers/Edit',compact('center', 'translations'));

        }catch(Exception $e){

          Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

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
    public function update(UpdateCenterRequest $request, Center $center)
    {

      try{

       // Log::info($this->company()->name.': Start center update');

       $locale = app()->getLocale();

       $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

       $this->authorize('update', $center);

        $request['updated_by'] =  auth()->user()->id;

        $center->update($request->all());

        // Log::info($this->company()->name.': End center store');

        return redirect()->route('centers.index')
        ->with('success', $translations['item updated successfully'] );

      }catch(Exception $e){

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End center update');

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
    public function destroy(Center $center)
    {
      try{

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $this->authorize('delete', $center);

        $center_exist = Employee::where('center_id',$center->id)->exists();

        if (!$center_exist && $center->delete()){  
          
          return redirect()->route('centers.index')
  
          ->with('success', $translations['item deleted successfully']);

      }

    }catch(Exception $e){

      Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

      $errorTime = Carbon::now();        

      return redirect()->back()

      ->with('error', $e->getMessage());

      }
    }
}
