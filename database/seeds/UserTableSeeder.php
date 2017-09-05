<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //retrieve admin role
        $admin_role=Role::where('name','Admin')->first();
        //
       $admin=new User();
       $admin->email="admin";
       $admin->name="admin";
       $admin->password=bcrypt('admin856366');
       $admin->save();
       $admin->roles()->attach($admin_role);
    }
}
