<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'issues',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('title');
                $table->text('description');
                $table->integer('severity_id');
                $table->integer('status_id');
                $table->integer('project_id');
                $table->integer('creator_id');
                $table->integer('executor_id');
                $table->integer('responsible_id');               
                $table->time('expected_time'); 
                $table->time('elapsed_time'); 
                $table->timestamp('start_date'); 
                $table->timestamp('close_date'); 
                $table->timestamps();             

            }
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issues');
       
    }
}
