<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'attachments', 
            function(Blueprint $table){
                $table->increments('id');
                $table->binary('attachment');
                $table->integer('comment_id')->references('id')->on('comments')->onDelete('cascade');;
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
        Schema::drop('attachment');
    }
}
