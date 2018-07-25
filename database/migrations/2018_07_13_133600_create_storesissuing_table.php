<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresissuingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storesissuing', function (Blueprint $table) {
            $table->increments('IssuesID');
            $table->integer('RequestID')->unsigned();
            $table->string('DepartmentName');
            $table->string('ProductName');
            $table->integer('QuantityIssued')->unsigned();
            $table->string('IssuedTo');
            $table->string('BatchNumber')->nullable();
            $table->string('IssuedBy');
            $table->date('IssueDate');
            $table->string('UpdatedBy');
            $table->timestamps();

            $table->foreign('RequestID')->references('RequestID')->on('storesrequests');
            $table->foreign('DepartmentName')->references('DepartmentName')->on('departmentlist');
            $table->foreign('ProductName')->references('ProductName')->on('storesproducts');
            $table->foreign('IssuedTo')->references('email')->on('users');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storesissuing');
    }
}
