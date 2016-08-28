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
                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->integer('issue_id')->unsigned()->index();
                $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
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
