<?php

use Illuminate\Database\Seeder;

class projectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('projects')->insert([
            'title'=>'first Project',
               'description'=>str_random(50),
        ]);
    }
}
