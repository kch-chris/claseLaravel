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
        factory(\App\Models\Clients::class)->times(10)->create();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
		$modules = ['users','products','clients','role','permission'];
		
		foreach($modules as $module)
		{
	        Permission::create(['name' => 'edit '.$module]);
			Permission::create(['name' => 'delete '.$module]);
			Permission::create(['name' => 'create '.$module]);
			Permission::create(['name' => 'see '.$module]);

			$role1 = Role::findOrCreate('admin');
			$role1->givePermissionTo('edit '.$module);
			$role1->givePermissionTo('delete '.$module);
			$role1->givePermissionTo('create '.$module);
			$role1->givePermissionTo('see '.$module);


		}
		
        $role2= Role::findOrCreate('guest');
        $role2->givePermissionTo('see clients');
        $role2->givePermissionTo('edit clients');
		$role2->givePermissionTo('see products');
    }
}
