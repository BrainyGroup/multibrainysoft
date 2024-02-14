<?php

namespace App\Http\Controllers;

use Exception;

use Inertia\Inertia;

use App\Models\Tenant;

use Inertia\Response;

use App\Models\User;

use App\Models\Company;

use App\Models\Employee;

use App\Models\Remuneration;

use App\Models\Organization;

use Illuminate\Http\Request;

use App\Models\RemunerationType;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Request as Req;

use Carbon\Carbon;

class RemunerationTypeController extends Controller
{
    
    private function company()
    {
         $user = User::find(auth()->user()->id);        
         return Company::find($user->company_id);
     }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{    

            $locale = app()->getLocale();
  
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
  
            $this->authorize('viewAny', RemunerationType::class);
            // Log::info($this->company()->name.': Start remunerationtype index');
  
            return Inertia::render('RemunerationTypes/Index',  [
              'translations' => $translations,
              'filters' => Req::all('search', 'trashed'),
              'can' => ['create_remuneration_type' => $request->user()->can('create', RemunerationType::class)],
              
              'remuneration_types' => RemunerationType::query()->where('company_id', $this->company()->id)
                  ->orderByName()
                  ->filter(Req::only('search', 'trashed'))
                  ->paginate(10)
                  ->withQueryString()
                  ->through(fn ($remuneration_type) => [
                      'id' => $remuneration_type->id,
                      'name' => $remuneration_type->name,
                      'description' => $remuneration_type->description,                 
                      'deleted_at' => $remuneration_type->deleted_at,
                  ]),
             ]);        
  
          }catch(Exception $e){
  
            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
  
            // Log::info($this->company()->name.': End remunerationtype index');
  
            $errorTime = Carbon::now();
  
            return redirect()->back()
  
            ->with('error', $e->getMessage());
          }
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{

            $locale = app()->getLocale();
    
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    
            $this->authorize('create', RemunerationType::class);

            return Inertia::render('RemunerationTypes/Create', compact('translations'));
    
          }catch(Exception $e){
    
            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
    
            $errorTime = Carbon::now();        
    
            return redirect()->back()
    
            ->with('error', $e->getMessage());
    
          }     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            // Log::info($this->company()->name.': Start remunerationtype store');
  
            $locale = app()->getLocale();
  
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
  
            $this->authorize('create', RemunerationType::class);

            $request['created_by'] =  auth()->user()->id;
  
            $request['country_id'] =  $this->company()->country_id;
  
            $request['company_id'] = $this->company()->id;
  
            $remunerationtype= RemunerationType::create($request->all());    
  
            Log::debug($this->company()->name.': RemunerationType created successful');
  
            // Log::info($this->company()->name.': End remunerationtype store');
  
            return redirect()->route('remuneration_types.index')
            ->with('success', $translations['item created succssfully']);
            
          }catch(Exception $e){
  
            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
  
            $errorTime = Carbon::now();;
  
            // Log::info($this->company()->name.': End remunerationtype store');
  
            return redirect()->back()
  
            ->with('error', $e->getMessage());
  
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(RemunerationType $remuneration_type)
    {
        try{

            $locale = app()->getLocale();
    
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    
            $this->authorize('view', $remuneration_type);

            return Inertia::render('RemunerationTypes/Show',compact('remuneration_type'));
    
            }catch(Exception $e){
    
              Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
    
              $errorTime = Carbon::now();        
    
              return redirect()->back()
    
              ->with('error', $e->getMessage());
    
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RemunerationType $remuneration_type)
    {
        try{

            $locale = app()->getLocale();
  
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
          
            $this->authorize('update', $remuneration_type);

            return Inertia::render('RemunerationTypes/Edit',compact('remuneration_type', 'translations'));
  
          }catch(Exception $e){
  
            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
  
            $errorTime = Carbon::now();        
  
            return redirect()->back()
  
            ->with('error', $e->getMessage());
  
          }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RemunerationType $remuneration_type)
    {
        try{

            // Log::info($this->company()->name.': Start remunerationtype update');
     
            $locale = app()->getLocale();
     
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
     
            $this->authorize('update', $remuneration_type);

             $request['updated_by'] =  auth()->user()->id;
     
             $remuneration_type->update($request->all());
     
             // Log::info($this->company()->name.': End remunerationtype store');
     
             return redirect()->route('remuneration_types.index')
             ->with('success', $translations['item updated successfully'] );
     
           }catch(Exception $e){
     
             Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
     
             $errorTime = Carbon::now();  
     
             // Log::info($this->company()->name.': End remunerationtype update');
     
             return redirect()->back()
     
             ->with('error', $e->getMessage());
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RemunerationType $remuneration_type)
    {
        try{

            $locale = app()->getLocale();
    
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    
            $this->authorize('delete', $remuneration_type);

            $remuneration_type_nemuretion_exist = Remuneration::where('remuneration_type_id',$remuneration_type->id)->exists();
    
       
      
           // $remuneration_type = RemunerationType::find($remuneration_type->id);
      
            if (!$remuneration_type_nemuretion_exist && $remuneration_type->delete()){
      
              
              return redirect()->route('remuneration_types.index')
      
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
