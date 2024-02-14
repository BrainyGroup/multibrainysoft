<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Inertia\Response;

use App\Models\User;

use App\Models\Employee;

use App\Models\Company;

use Illuminate\Support\Arr;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Permission;

use App\Http\Requests\StoreUserRequest;

use App\Http\Requests\UpdateUserRequest;

use Illuminate\Support\Facades\Request as Req;

use App\Jobs\NewUserWelcomeEmailJob;

use Illuminate\Support\Facades\Log;

use Carbon\Carbon;




class UserMainController extends Controller
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
     */
    public function index()
    {

        try{   

            $locale = app()->getLocale();

            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

            // $mployee_ids = Employee::pluck('id')->toArray();

            return Inertia::render('MainUsers/Index',  [
                'translations' => $translations,
                'filters' => Req::all('search', 'trashed'),
                'users' =>User::query()
                    ->orderByName()
                    ->filter(Req::only('search', 'trashed'))
                    ->paginate(10)
                    ->withQueryString()
                    ->through(fn ($user) => [
                        'id' => $user->id,
                        // 'is_employee' => in_array($user->id, $mployee_ids) ? 1 : 0,
                        'name' => $user->name,
                        'email' => $user->email,
                        'gender' => $user->sex,
                        'marital_status' => $user->marital_status ? "Married" : "Not Married",
                        'mobile' => $user->mobile,
                        // 'owner' => $user->owner,
                        // 'photo' => $user->profile_photo_path ? URL::route('image', ['path' => $user->profile_photo_path, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
                        'deleted_at' => $user->deleted_at,
                    ]),


            ]);

        }catch(Exception $e){

            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

            // Log::info($this->company()->name.': End level index');
  
            $errorTime = Carbon::now();
  
            return redirect()->back()
  
            ->with('error', $translations['page can not be displayed']. ' - ' .$errorTime->toDateTimeString());
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

            $roles = Role::get();

            return Inertia::render('MainUsers/Create',compact('roles', 'translations'));

        }catch(Exception $e){

            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

            $errorTime = Carbon::now();        
    
            return redirect()->back()
    
            ->with('error', $translations['page can not be displayed']. ' - ' . $errorTime->toDateTimeString());
        }
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        try{

            $locale = app()->getLocale();

            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
        
        $request['created_by'] =  Auth::user()->id;    
      

        $request['country_id'] =  $this->company()->country_id;     
        

        $request['company_id'] = $this->company()->id;   

        $request['password'] = Hash::make($request['password']);

        DB::beginTransaction();

        $user = User::create($request->all());

        $roles = Role::get();       

        $roles = $user->syncRoles($request['roleIds']);

        DB::commit();

        Log::debug($this->company()->name.': User created successful');

        dispatch(new NewUserWelcomeEmailJob($user->email, $user))->onConnection('central');

        return redirect()->route('users.index')

        ->with('success', $translations['item created succssfully']);

    }catch(Exception $e){

        DB::rollBack();

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();;

        // Log::info($this->company()->name.': End level store');

        return redirect()->back()

        ->with('error',$translations['item can not be created']. ' - '  . $errorTime->toDateTimeString());

        
        return redirect()->route('users.index')

        ->with('success','User created successfully.');

    }



        // if (!$user and !$roles)
        //     {
        //         DB::rollBack();
        //     }else{
        //         DB::commit();

        //         dispatch(new NewUserWelcomeEmailJob($user->email, $user))->onConnection('central');

        //      return redirect()->route('users.index')
        //                 ->with('success','User created successfully.');
        //     }
        
           
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        try{

            $locale = app()->getLocale();
    
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
    
         
    
            // $user = User::findOrFail($id);
            $roles = Role::get(); 

            $userRoles = $user->roles->pluck('id','id')->all();

            return Inertia::render('MainUsers/Show',compact('user', 'roles', 'userRoles'));

        }catch(Exception $e){

            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
  
            $errorTime = Carbon::now();        
  
            return redirect()->back()
  
            ->with('error', $translations['page can not be displayed']. ' - '  . $errorTime->toDateTimeString());
  
          }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user = User::findOrFail($id);
        try{

            $locale = app()->getLocale();
  
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

            $roles = Role::get(); 

            $userRoles = $user->roles->pluck('id','id')->all();

            return Inertia::render('MainUsers/Edit',compact('user', 'roles', 'userRoles','translations'));

        }catch(Exception $e){

            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

            $errorTime = Carbon::now();        
  
            return redirect()->back()
  
            ->with('error', $translations['page can not be displayed']. ' - '  . $errorTime->toDateTimeString());
  
          }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        try{

            // Log::info($this->company()->name.': Start level update');
  
            $locale = app()->getLocale();
  
            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
  
            $request['updated_by'] =  auth()->user()->id;        

            if (isset($request['photo'])) {
                //    $user = User::find($id);
                $user->updateProfilePhoto($request['photo']);
            }

            $input = $request->all();

            if(!empty($input['password'])){
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input,array('password'));
            }


            DB::beginTransaction();
            //    $user = User::find($id);
            $user_updated = $user->update($input);

            DB::table('model_has_roles')->where('model_id',$user->id)->delete();

            $roles_updated = $user->assignRole($request->input('roleIds'));

            DB::commit();

            return redirect()->route('users.index')

            ->with('success', $translations['item updated successfully'] );

       // $roles = $user->syncRoles($request['roleIds']);

    }catch(Exception $e){

        DB::rollBack();

        Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        $errorTime = Carbon::now();  

        // Log::info($this->company()->name.': End level update');

        return redirect()->back()

        ->with('error',$translations['item can not be updated']. ' - ' . $errorTime->toDateTimeString());
    }

    //    if (!$user_updated and !$roles_updated)
    //    {
    //        DB::rollBack();
    //    }else{
    //        DB::commit();

    //     return redirect()->route('users.index')
    //                ->with('success','User updated successfully.');
    //    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $locale = app()->getLocale();

            $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

            $user_exist = Employee::where('user_id',$user->id)->exists();

            if (!$user_exist && $user->delete()){
            
            return redirect()->route('users.index')
    
            ->with('success', $translations['item deleted successfully']);
            }
        }catch(Exception $e){

            Log::error($this->company()->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
      
            $errorTime = Carbon::now();        
      
            return redirect()->back()
      
            ->with('error', $translations['item could not be deleted']. ' - ' . $errorTime->toDateTimeString());        
      
            }
    }
}
