<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('payment_id')->index();
            $table->unsignedBigInteger('pickup_id')->index()->nullable();
            $table->unsignedBigInteger('coupane_id')->index()->nullable();
            $table->string('code');
            $table->integer('shipping');
            $table->integer('discount')->nullable();
            $table->string('name');
            $table->string('mobile');
            $table->text('address')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('pickup_id')->references('id')->on('pickups');
            $table->foreign('coupane_id')->references('id')->on('coupanes');
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
        Schema::dropIfExists('orders');
    }
}
