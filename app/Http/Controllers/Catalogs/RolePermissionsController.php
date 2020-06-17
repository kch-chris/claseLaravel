<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RolePermissionsRequest;
use App\Models\RolePermissions;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Roles;
use DB;

class RolePermissionsController extends Controller
{
    public function index(){
        $roles = Role::get();
        
        return view('catalogs.rolepermissions.index')->with('roles',$roles);

    }

    public function create()
    {
        $data = [
            'roles'  => 'Raphael',
            'permissions'   => 22
        ];

        return view('catalogs.rolepermissions.create')->with($data);
    }

    public function store(Request $request)
    {
        // dd($request->post('description'));

        $newrolepermission = new RolePermissions();

        $newrolepermission->permission_id = $request->post('permission_id');
        $newrolepermission->role_id = $request->post('role_id');

        $newrolepermission->save();

        return redirect()->route('rolepermissions.index');
    }

    public function edit($id)
    {
        $role = Roles::find($id);
        
        $permission =Roles::getPermissions($role->id);

        return view('catalogs.rolepermissions.edit')->with(['role'=>$role, 'permissions'=>$permission]);
    }

    public function update($id,Request $request)
    {
        
        $role = Role::find($id);
        $permissions=[];
        if($request->has('permissions'))
        { 
            $permissions=array_keys($request->post('permissions'));
        }

        $role->syncPermissions($permissions);

        return redirect()->route('rolepermissions.index');

    }

    public function destroy($id)
    {
        RolePermissions::destroy($id);

        return redirect()->route('rolepermissions.index');
    }
}
