<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Req;
// use Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

use Inertia\Response;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);
        
        // $this->authorize('viewAny', Role::class);
        
        $roles = Role::all();

        $can = ['create_role' => $request->user()->can('create', Bank::class)];

        return Inertia::render('Roles/Index',compact('roles','can', 'translations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        // $this->authorize('create', Role::class);
        
        $permissions = Permission::get();
        return Inertia::render('Roles/Create',compact('permissions','translations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        // $this->authorize('create', Role::class);
        
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissionIds' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permissionIds'));

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $role = Role::find($id);

        // $this->authorize('view', $role);

        $permissions = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locale = app()->getLocale();

        $translations = json_decode(file_get_contents(base_path("lang/$locale.json")), true);

        $role = Role::find($id);

        // $this->authorize('update', $role);

        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();


        return Inertia::render('Roles/Edit',compact('role','permissions','rolePermissions','translations'));
        //return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'permissionIds' => 'required',
        ]);

        $role = Role::find($id);

        // $this->authorize('update', $role);

        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permissionIds'));

        return redirect()->back()
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $role = Role::find($id);
        // $this->authorize('delete', $role);
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
