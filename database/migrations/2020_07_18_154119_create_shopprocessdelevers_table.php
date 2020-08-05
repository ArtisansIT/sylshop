<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopprocessdeleversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopprocessdelevers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('shop_id')->index();
            $table->unsignedBigInteger('variation_id')->index()->nullable();
            $table->unsignedBigInteger('orderdetails_id')->index();
            $table->boolean('processing_status')->default(false);
            $table->boolean('processing_payment_status')->default(false);
            $table->boolean('delevery_status')->default(false);
            $table->boolean('delevery_payment_status')->default(false);
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('variation_id')->references('id')->on('variations')->cascadeOnDelete();
            $table->foreign('orderdetails_id')->references('id')->on('orderdetails')->cascadeOnDelete();
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
        Schema::dropIfExists('shopprocessdelevers');
    }
}
