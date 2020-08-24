<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $user = new \App\User;
        $user->name = 'Administrator';
        $user->email = 'admin-ccit@gmail.com';
        $user->password = bcrypt('!!Admin123!!');
        $user->level=0;
        $user->save();
    }
}
