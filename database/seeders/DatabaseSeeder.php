<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // // create permissions

        Customer::create(['name' => 'Imtiyaz', 'email' => 'Imtiyaz@gmail.com', 'phone' => '03336942112', 'customer_type' => 0, ]);
        Customer::create(['name' => 'Qamar', 'email' => 'qamar@gmail.com', 'phone' => '03002562112', 'customer_type' => 1, ]);

        Product::create(['name' => 'Sprite' ]);
        Product::create(['name' => 'Next Cola' ]);
        Product::create(['name' => 'Vim' ]);

        $permission = Permission::create(['name' => 'Product access']);
        $permission = Permission::create(['name' => 'Product edit']);
        $permission = Permission::create(['name' => 'Product create']);
        $permission = Permission::create(['name' => 'Product delete']);
        $permission = Permission::create(['name' => 'Packing access']);
        $permission = Permission::create(['name' => 'Packing edit']);
        $permission = Permission::create(['name' => 'Packing create']);
        $permission = Permission::create(['name' => 'Packing delete']);

        $permission = Permission::create(['name' => 'Vendor access']);
        $permission = Permission::create(['name' => 'Vendor edit']);
        $permission = Permission::create(['name' => 'Vendor create']);
        $permission = Permission::create(['name' => 'Vendor delete']);

        $permission = Permission::create(['name' => 'Stock access']);
        $permission = Permission::create(['name' => 'Stock edit']);
        $permission = Permission::create(['name' => 'Stock create']);
        $permission = Permission::create(['name' => 'Stock delete']);

        $permission = Permission::create(['name' => 'Sale access']);
        $permission = Permission::create(['name' => 'Sale edit']);
        $permission = Permission::create(['name' => 'Sale create']);
        $permission = Permission::create(['name' => 'Sale delete']);

        $permission = Permission::create(['name' => 'Customer access']);
        $permission = Permission::create(['name' => 'Customer edit']);
        $permission = Permission::create(['name' => 'Customer create']);
        $permission = Permission::create(['name' => 'Customer delete']);

        $permission = Permission::create(['name' => 'Expense access']);
        $permission = Permission::create(['name' => 'Expense edit']);
        $permission = Permission::create(['name' => 'Expense create']);
        $permission = Permission::create(['name' => 'Expense delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        // create roles and assign created permissions

        $superadmin = Admin::create([
            'name' => 'Super-Admin',
            'email' => 'alvizulqarnain@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        $admin = Admin::create([
            'name' => 'Imran',
            'email' => 'imran@gmail.com',
            'password' => bcrypt('password')
        ]);
        

        $user = User::create([
            'name' => 'Alvi',
            'email' => 'alvi@gmail.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        
        $role_admin = Role::create(['name' => 'super-admin']);
        $role_admin->givePermissionTo(Permission::all());
        
        //$superadmin->assignRole('super-admin');
        //$admin->assignRole('admin');
        $user->assignRole('admin');

         //$admin->assignRole('super-admin', 'admin'); 
         //$admin->assignRole('super-admin', 'admin'); // Here 'admin' is the guard name

        // $admin->assignRole('super-admin');
        // Retrieve existing role or create a new one
        
        // $role = Role::where('name', 'super-admin')->where('guard_name', 'admin')->first();
        // //dd($role);
        // if (!$role) {
        //     // Role doesn't exist, create a new one
        //     // $role = new Role(['name' => 'super-admin']);
        //     // $role->guard('admin')->save(); // Specify guard context and save
        //     $role = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
        // }

        //  $role = Role::guard('admins')->create(['name' => 'super-admin']);
       // $role_admin->givePermissionTo(Permission::all());

        //$admin = Auth::guard('admin')->user();

    }
}
