<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash; 

class RolesPermissionDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'guest']);

        $user = Factory(App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234567890')
        ]);
        
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => Hash::make('0987654321')
        ]);
        $user->assignRole($role2);

    }
}
