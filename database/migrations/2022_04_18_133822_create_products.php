<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_id', 10)->primary();
            $table->string('product_name');
            $table->string('price', 10);
            $table->string('product_category_id', 10);
            $table->string('unit_id', 5);
            $table->text('description');
            $table->foreign('product_category_id')->references('product_category_id')->on('product_categorys')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('unit_id')->references('unit_id')->on('product_units')->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
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
