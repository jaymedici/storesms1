<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffassignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffassignment', function (Blueprint $table) {
            $table->increments('AssignmentID');
            $table->string('UserEmail');
            $table->string('DepartmentName');
            $table->string('Role');
            $table->string('UpdatedBy');
            $table->timestamps();

            $table->foreign('UserEmail')->references('email')->on('users');
            $table->foreign('DepartmentName')->references('DepartmentName')->on('departmentlist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffassignment');
    }
}
