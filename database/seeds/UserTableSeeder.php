<?php

use Illuminate\Database\Seeder;
use LTF\User as User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the user database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(['name' => 'Admin', 'email' => 'admin@liverpoolthailand.com', 'password' => '123456']);
    }
}
