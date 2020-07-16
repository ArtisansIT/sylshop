<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('shop_id')->index();
            $table->unsignedBigInteger('variation_id')->index()->nullable();
            $table->integer('price');
            $table->integer('total');
            $table->integer('quentity');
            $table->boolean('comment')->default(false)->index();
            $table->boolean('pending')->default(true);
            $table->boolean('check')->default(false);
            $table->boolean('received')->default(false);
            $table->boolean('packing')->default(false);
            $table->boolean('shipped')->default(false);
            $table->boolean('piked')->default(false);
            $table->boolean('delivered')->default(false);
            $table->boolean('return')->default(false);
            $table->boolean('return_received')->default(false);
            $table->boolean('handover')->default(false);
            $table->boolean('cancel')->default(false);
            $table->boolean('shopCancel')->default(false);
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('variation_id')->references('id')->on('variations');
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
        Schema::dropIfExists('orderdetails');
    }
}
