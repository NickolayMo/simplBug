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
              'title'=> str_random(10),
               'description'=> str_random(10),
               'severity_id'=> 1,
               'status_id'=> 1,
               'project_id'=> 1,
               'creator_id'=> 1,
                'executor_id'=> 1,
               'responsible_id'=> 1,
               'date_expected'=>\Carbon\Carbon::now()->toDateTimeString(),
               'time_expected'=>'1 day',           
         
        ]);
    }
}
