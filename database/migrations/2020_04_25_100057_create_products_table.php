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
            $table->string('name');
            $table->string('code')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('shop_id')->index();
            $table->unsignedBigInteger('subcategory_id')->index();
            $table->integer('main_price');
            $table->integer('offer_price')->nullable();
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->text('ship_return')->nullable();
            $table->string('link')->nullable();
            $table->boolean('status')->index()->default(false);
            $table->string('serch_tag')->index()->nullable();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
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
