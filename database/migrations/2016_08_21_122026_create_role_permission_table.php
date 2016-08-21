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
            function(Blueprint $table){
                $table->increments('id');
                $table->integer('role_id')->unsigned()->index();
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('permission_id')->unsigned()->index();
                $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');                
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
