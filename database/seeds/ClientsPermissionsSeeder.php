<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class ClientsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Clients::class)->times(20)->create();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'edit clients']);
        Permission::create(['name' => 'delete clients']);
        Permission::create(['name' => 'create clients']);
        Permission::create(['name' => 'see clients']);

        $role1 = Role::findOrCreate('admin');
        $role1->givePermissionTo('edit clients');
        $role1->givePermissionTo('delete clients');
        $role1->givePermissionTo('create clients');
        $role1->givePermissionTo('see clients');

        $role2= Role::findOrCreate('guest');
        $role2->givePermissionTo('see clients');
        $role2->givePermissionTo('edit clients');
    }
}
