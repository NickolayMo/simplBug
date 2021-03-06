<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeverityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'severities',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('title');
                $table->string('description')->nullable();
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
        Schema::drop('severities');
    }

}
