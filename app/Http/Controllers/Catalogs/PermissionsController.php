<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionsRequest;
use App\Models\Permissions;

class PermissionsController extends Controller
{
    public function index(){

        $permissions = Permissions::where('id','>', 0)->get();;
        
        return view('catalogs.permissions.index')->with('permissions',$permissions);

    }

    public function create()
    {
        return view('catalogs.permissions.create');
    }

    public function store(Request $request)
    {
        // dd($request->post('description'));

        $newpermission = new Permissions();

        $newpermission->name = $request->post('name');
        $newpermission->guard_name = $request->post('guard_name');

        $newpermission->save();

        return redirect()->route('permissions.index');
    }

    public function edit($permission)
    {
        $permissions = Permissions::where('id', '=' , $permission)->firstOrFail();
        // dd($role);
        return view('catalogs.permissions.edit')->with('permission',$permissions);
    }

    public function update($id,Request $request)
    {
        $permission = Permissions::where('id', '=' , $id)->firstOrFail();

        $permission->name = $request->post('name');
        $permission->guard_name = $request->post('guard_name');

        $permission->save();

        return redirect()->route('permissions.index');

    }

    public function destroy($id)
    {
        Permissions::destroy($id);

        return redirect()->route('permissions.index');
    }
}
