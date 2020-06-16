<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(){

        $roles = Role::where('id','>', 0)->get();;
        
        return view('catalogs.roles.index')->with('roles',$roles);

    }

    public function create()
    {
        return view('catalogs.roles.create');
    }

    public function store(Request $request)
    {
        // dd($request->post('description'));

        $newRole = new Role();

        $newRole->name = $request->post('name');
        $newRole->guard_name = $request->post('guard_name');

        $newRole->save();

        return redirect()->route('roles.index');
    }

    public function edit($role)
    {
        $roles = Role::where('id', '=' , $role)->firstOrFail();
        // dd($role);
        return view('catalogs.roles.edit')->with('role',$roles);
    }

    public function update($id,Request $request)
    {
        $role = Role::where('id', '=' , $id)->firstOrFail();

        $role->name = $request->post('name');
        $role->guard_name = $request->post('guard_name');

        $role->save();

        return redirect()->route('roles.index');

    }

    public function destroy($id)
    {
        Role::destroy($id);

        return redirect()->route('roles.index');
    }
}
