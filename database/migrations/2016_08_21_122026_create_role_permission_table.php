<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'role_permission',
            function(Bluprint $table){
                $table->incriment();
                $table->integer('role_id')->unsigned()->index();
                $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
                $table->foreign('permission_id')->references('id')->on('permission')->onDelete('cascade');
                $table->foreign('permission_id')->unsigned()->index();
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
        Schema::drop('role_permission');
    }
}
