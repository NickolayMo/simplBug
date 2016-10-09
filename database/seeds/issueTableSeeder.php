<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class issueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('issues')->insert([           
              'title'=> 'first issue',
               'description'=> 'first issue',
               'severity_id'=> 1,
               'status_id'=> 1,
               'project_id'=> 1,
               'creator_id'=> 1,
                'executor_id'=> 1,
               'responsible_id'=> 1,
              
         
        ]);
        DB::table('issues')->insert([           
              'title'=> 'seonnd issue',
               'description'=> 'first issue',
               'severity_id'=> 1,
               'status_id'=> 1,
               'project_id'=> 1,
               'creator_id'=> 1,
                'executor_id'=> 1,
               'responsible_id'=> 1,
              
         
        ]);
    }
}
