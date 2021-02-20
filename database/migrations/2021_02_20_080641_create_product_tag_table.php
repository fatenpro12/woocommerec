<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_tags', function (Blueprint $table) {

            $table->unsignedBigInteger('tag_id')->unsigned();

            $table->unsignedBigInteger('product_id')->unsigned();

            $table->foreign('tag_id')->references('id')->on('tags')

                ->onDelete('cascade');

            $table->foreign('product_id')->references('id')->on('products')

                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_tags');
    }
}
