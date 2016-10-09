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
            'description'=>'first project',
        ]);
         Db::table('projects')->insert([
            'title'=>'second Project',
            'description'=>'second project',
        ]);
          Db::table('projects')->insert([
            'title'=>'third Project',
            'description'=>'third project',
        ]);
    }
}
