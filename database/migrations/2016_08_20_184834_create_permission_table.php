<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermitionTable extends Migration
{
    public function up()
    {
        Schema::create(
            'permissions',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('title')->unique();
                $table->string('desciption')->nullable();
                $table->string('slug')->unique();
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
        Schema::drop('permissions');
    }

}