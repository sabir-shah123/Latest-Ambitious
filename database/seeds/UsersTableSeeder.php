<?php

use Illuminate\Database\Seeder;
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
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'user',
                'status'=>'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}
