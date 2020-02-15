<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','Admin')->first();
        $svcmktgRole = Role::where('name','Service Marketing')->first();
        $jobctrlRole = Role::where('name','Job Controller')->first();
        $chekRole = Role::where('name','Checklister')->first();
        $sekRole = Role::where('name','Company Guard')->first();


        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);

        $svcmktg = User::create([
            'name' => 'Karla Lilles',
            'username' => 'kurloo',
            'email' => 'karla@gmail.com',
            'password' => Hash::make('asdf1234'),
        ]);

        $jobctrler = User::create([
            'name' => 'Czarina  Agles',
            'username' => 'czar',
            'email' => 'czar@gmail.com',
            'password' => Hash::make('hello1234'),
        ]);

        $chklistr = User::create([
            'name' => 'Samuel Quezon',
            'username' => 'sammy',
            'email' => 'sam@gmail.com',
            'password' => Hash::make('sam1234'),
        ]);

        $sekyu = User::create([
            'name' => 'Roger That',
            'username' => 'roger',
            'email' => 'roger@gmail.com',
            'password' => Hash::make('roger456'),
        ]);

        $admin->roles()->attach($adminRole);
        $svcmktg->roles()->attach($svcmktgRole);
        $jobctrler->roles()->attach($jobctrlRole);
        $chklistr->roles()->attach($chekRole);
        $sekyu->roles()->attach($sekRole);


    }
}
