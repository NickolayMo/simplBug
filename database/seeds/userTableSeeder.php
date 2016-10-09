<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'login' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test'),
        ]);
        DB::table('users')->insert([
            'name' => 'test2',
            'login' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('test2'),
        ]);
    }
}
