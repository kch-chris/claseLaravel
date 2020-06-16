<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
//use App\Http\Requests\UsersRequest;
use App\User;

class UsersController extends Controller
{
    public function index(){

        $roles = User::where('id','>', 0)->get();;
        
        return view('catalogs.users.index')->with('users',$roles);

    }

    public function create()
    {
        $roles = Role::all();

        return view('catalogs.users.create')->with('roles',$roles->toArray());
    }

    public function store(Request $request)
    {
        // dd($request->post('description'));

        $newRole = new User();

        $newRole->name = $request->post('name');
        $newRole->guard_name = $request->post('guard_name');

        $newRole->save();

        return redirect()->route('users.index');
    }

    public function edit($user)
    {
        $users = User::where('id', '=' , $user)->firstOrFail();
        // dd($role);
        return view('catalogs.users.edit')->with('role',$users);
    }

    public function update($id,Request $request)
    {
        $role = User::where('id', '=' , $id)->firstOrFail();

        $role->name = $request->post('name');
        $role->guard_name = $request->post('guard_name');

        $role->save();

        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        Users::destroy($id);

        return redirect()->route('users.index');
    }
}
