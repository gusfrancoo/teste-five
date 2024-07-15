<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Permission::where('name', 'approve files')->exists()) {
            Permission::create(['name' => 'approve files']);
        }

        if(!Role::where('name', 'admin')->exists()){

            $adminRole = Role::create(['name' => 'admin']);
            $adminRole->givePermissionTo('approve files');

        } else {

            $adminRole = Role::where('name', 'admin')->first();
            $adminRole->givePermissionTo('approve files');
        }


        if (!Role::where('name', 'user')->exists()) {

            $userRole = Role::create(['name' => 'user']);

        } else{

            $userRole = Role::where('name', 'user')->first();
        }

        $admin = User::where('email', 'admin@gmail.com')->first();

        if ($admin){
            $admin->assignRole($adminRole);

        } else{

            $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 12345678, // Substitua por uma senha segura
            ]);
            $admin->assignRole($adminRole);

        }

        $users = User::doesntHave('roles')->get();
        foreach ($users as $user) {
            $user->assignRole($userRole);
        }
    }
}
