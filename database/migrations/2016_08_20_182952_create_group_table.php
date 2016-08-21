<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    public function up()
    {
        Schema::create(
            'groups',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('title');
                $table->text('desciption')->nullable();
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
        Schema::drop('groups');
    }
}