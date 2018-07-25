<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storesrequests', function (Blueprint $table) {
            $table->increments('RequestID');
            $table->date('RequestDate');
            $table->string('DepartmentName');
            $table->string('RequestBy');
            $table->string('ProductName');
            $table->integer('QuantityRequested')->unsigned();
            $table->string('HoD');
            $table->integer('QuantityApproved')->unsigned();
            $table->string('ApprovalStatus');
            $table->string('RequestStatus');
            $table->integer('QuantityIssued')->unsigned();
            $table->string('UpdatedBy');
            $table->timestamps();

            $table->foreign('DepartmentName')->references('DepartmentName')->on('departmentlist');
            $table->foreign('RequestBy')->references('email')->on('users');
            $table->foreign('HoD')->references('email')->on('users');
            $table->foreign('ProductName')->references('ProductName')->on('storesproducts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storesrequests');
    }
}
