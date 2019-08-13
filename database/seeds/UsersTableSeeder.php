<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        User::create(array('email' => 'alex@mail.com',
            'name' => 'Alex',
            'password' => Hash::make('123456')));

        User::create(array('email' => 'jack@mail.com',
            'name' => 'Jack',
            'password' => Hash::make('123456')));

        User::create(array('email' => 'jessy@mail.com',
            'name' => 'jessy',
            'password' => Hash::make('123456')));

        User::create(array('email' => 'tom@mail.com',
            'name' => 'Tom',
            'password' => Hash::make('123456')));

        User::create(array('email' => 'lara@mail.com',
            'name' => 'Lara',
            'password' => Hash::make('123456')));

        User::create(array('email' => 'ann@mail.com',
            'name' => 'Ann',
            'password' => Hash::make('123456')));
    }
}
