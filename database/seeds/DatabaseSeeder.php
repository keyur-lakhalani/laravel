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
        DB::table('users')->insert([
            'name' => 'poll admin',
            'email' => 'poll_admin@gmail.com',
            'password' => bcrypt('password1234'),
        ]);
    }
}
