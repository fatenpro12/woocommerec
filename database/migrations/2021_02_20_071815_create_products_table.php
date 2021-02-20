<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description')->nullable();
            $table->unsignedBigInteger('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->float('price');
            $table->integer('stock')->nullable();
            $table->float('discount')->nullable();
            $table->json('options')->nullable();
            $table->unsignedBigInteger('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
