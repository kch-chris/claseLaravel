<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash; 
class UsersController extends Controller
{
    public function index(){

        $users = User::where('id','>', 0)->get();;
        
        return view('catalogs.users.index')->with('users',$users);

    }

    public function create()
    {

        $roles=Role::select('name')->where('id','>',0)->get();

        
        return view('catalogs.users.create')
                ->with('roles',$roles);
    }

    public function store(UsersRequest $request)
    {
        $newUser = new User();

        $newUser->name = $request->post('name');
        $newUser->email = $request->post('email');
        $newUser->password = Hash::make($request->post('password'));

        $newUser->save();

        $newUser->assignRole($request->post('role'));
        return redirect()->route('users.index');
    }

    public function edit($user)
    {
        $user = User::where('id', '=' , $user)->firstOrFail();
        $roles=Role::select('name')->where('id','>',0)->get();
        
        return view('catalogs.users.edit')->with(['user'=>$user,'roles'=>$roles]);
    }

    public function update($id,UsersRequest $request)
    {
        $user = User::where('id', '=' , $id)->firstOrFail();

        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = Hash::make($request->post('password'));

        $user->save();

        $user->assignRole($request->post('role'));

        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        user::destroy($id);

        return redirect()->route('users.index');
    }


    public function editPermissions($userId){

        $permissions = Permission::all();

        $user = User::findorFail($userId);

        $usPermission= $user->getAllPermissions();
        //dd($usPermission);
        return view('catalogs.users.permissions')->with([
            'permissions'=>$permissions,
            'user'=>$user,
            'usPermission'=>$usPermission
            ]);
    }
}
