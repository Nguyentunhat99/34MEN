<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
            'admin_name'=>'nhatadmin',
            'admin_email'=>'nhanguyenadmin030499@gmail.com',
            'admin_phone'=>'0399025796',
            'admin_password'=>md5('123456789'),
        ]);
        
        $author = Admin::create([
            'admin_name'=>'nhatauthor',
            'admin_email'=>'nhanguyenauthor030499@gmail.com',
            'admin_phone'=>'0399025796',
            'admin_password'=>md5('123456789')
        ]);
        
        $user = Admin::create([
            'admin_name'=>'nhatuser',
            'admin_email'=>'nhanguyenuser030499@gmail.com',
            'admin_phone'=>'0399025796',
            'admin_password'=>md5('123456789')
        ]);
        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
