<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use DB;

class Roles extends Role
{
    public static function getPermissions($roleId)
    {
        $permission = DB::table('permissions')
        ->select(
            'permissions.name as NombrePermiso',
            'role_has_permissions.permission_id as idPermiso'
        )
        ->leftJoin('role_has_permissions', 'role_has_permissions.permission_id','=','permissions.id')
        ->where('role_has_permissions.role_id','=',$roleId)
        ->get();

        return $permission;

    }
    
}
