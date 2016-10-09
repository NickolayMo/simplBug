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
             'description'=>'Hight',
        ]);
         Db::table('severities')->insert([
            'title'=>'Low',
             'description'=>'Low',
        ]);
         Db::table('severities')->insert([
            'title'=>'Medium',
             'description'=>'Medium',
        ]);
    }
}
