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
                $table->bigIncrements('id');
                $table->string('title');
                $table->text('desciption');
                $table->integer('severity');
                $table->integer('status');
                $table->integer('creator');
                $table->integer('executor');
                $table->integer('responsible');
                $table->timestamp('date_created');
                $table->timestamp('date_updated');
                $table->timestamp('date_expected');
                $table->time('time_expected');              

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
