<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(issueTableSeeder::class);
        $this->call(projectTableSeeder::class);
        $this->call(severityTableSeeder::class);
        $this->call(statusTableSeeder::class);
        $this->call(userTableSeeder::class);
    }
}
