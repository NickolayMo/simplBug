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
            'title'=>'Relise',
             'description'=>str_random(50),
        ]);
    }
}
