<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storesproducts', function (Blueprint $table) {
            $table->string('ProductID')->primary();
            $table->string('CategoryName');
            $table->string('ProductName')->unique();
            $table->string('Units', 50)->nullable();
            $table->integer('QuantityInStock')->unsigned();
            $table->integer('Threshold')->unsigned()->default(0);
            $table->decimal('EstimatedPrice',10,0)->default(0);
            $table->string('Location')->nullable();
            $table->string('UpdatedBy');
            $table->timestamps();

            $table->foreign('CategoryName')->references('CategoryName')->on('storescategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storesproducts');
    }
}
