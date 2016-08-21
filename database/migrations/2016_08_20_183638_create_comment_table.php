<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    public function up()
    {
        Schema::create(
            'comments',
            function(Blueprint $table){
                $table->increments('id');
                $table->string('text');
                $table->integer('user');
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
        Schema::drop('comments');
    }
}