<?php

use Illuminate\Database\Seeder;

class severityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('severities')->insert([
            'title'=>'Hight',
             'description'=>str_random(50),
        ]);
    }
}
