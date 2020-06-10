<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RolePermissionsRequest;
use App\Models\RolePermissions;

class RolePermissionsController extends Controller
{
    public function index(){

        $permissions = RolePermissions::get();
        
        return view('catalogs.rolepermissions.index')->with('rolepermissions',$permissions);

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

    public function edit($permission)
    {
        $permissions = RolePermissions::where('id', '=' , $permission)->firstOrFail();
        // dd($role);
        return view('catalogs.rolepermissions.edit')->with('permission',$permissions);
    }

    public function update($id,Request $request)
    {
        $permission = RolePermissions::where('id', '=' , $id)->firstOrFail();

        $permission->name = $request->post('name');
        $permission->guard_name = $request->post('guard_name');

        $permission->save();

        return redirect()->route('rolepermissions.index');

    }

    public function destroy($id)
    {
        RolePermissions::destroy($id);

        return redirect()->route('rolepermissions.index');
    }
}
