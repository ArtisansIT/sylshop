<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoupanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupanes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('shop_id')->index()->nullable();
            $table->unsignedBigInteger('subcategory_id')->index()->nullable();
            $table->string('name');
            $table->string('code');
            $table->integer('total');
            $table->integer('discount');
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
        Schema::dropIfExists('coupanes');
    }
}
