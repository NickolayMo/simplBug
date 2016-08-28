<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
   public function up()
    {
        Schema::create(
            'roles',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('title')->unique();
                $table->string('description')->nullable();
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
        Schema::drop('roles');
    }
}
