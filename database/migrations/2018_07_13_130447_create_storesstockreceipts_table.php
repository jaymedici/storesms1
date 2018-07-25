<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresstockreceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storesstockreceipts', function (Blueprint $table) {
            $table->increments('ReceiptID');
            $table->date('DateOfReceipt');
            $table->string('ProductName');
            $table->integer('QuantityReceived')->unsigned();
            $table->string('AccountCharged');
            $table->string('BatchNumber')->nullable();
            $table->date('DateOfExpiry');
            $table->string('ReceivedBy');
            $table->string('UpdatedBy');
            $table->timestamps();

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
        Schema::dropIfExists('storesstockreceipts');
    }
}
