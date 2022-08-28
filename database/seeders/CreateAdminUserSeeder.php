<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'fname' => 'احمد',
            'lname' => 'الهادي',
            'name' => 'admin',
            'mobile' => '966540437879',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);




        $employee_role = Role::create(['name' => 'Employee']);
        $employee = User::create([
            'fname' => 'موظف',
            'lname' => 'موظف',
            'name' => 'employee',
            'mobile' => '96655000000',
            'email' => 'employee@employee.com',
            'password' => bcrypt('123456')
        ]);
        $employee->assignRole([$employee_role->id]);


    }
}
