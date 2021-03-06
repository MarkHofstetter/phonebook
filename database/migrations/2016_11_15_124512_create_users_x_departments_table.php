<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersXDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users_x_departments', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('user_id')->unsigned();
           $table->integer('department_id')->unsigned();
           $table->rememberToken();
           $table->timestamps();
           $table->foreign('user_id')->references('id')->on('users');
           $table->foreign('department_id')->references('id')->on('departments');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('users_x_departments');
    }
}
