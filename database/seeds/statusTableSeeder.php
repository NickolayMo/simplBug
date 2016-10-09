<?php

use Illuminate\Database\Seeder;

class statusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Db::table('statuses')->insert([
            'title'=>'Release',
            'description'=>'Release',
        ]);
       Db::table('statuses')->insert([
            'title'=>'In progress',
            'description'=>'In progress',
        ]);
       Db::table('statuses')->insert([
            'title'=>'Test',
            'description'=>'Test',
        ]);
       
    }
}
