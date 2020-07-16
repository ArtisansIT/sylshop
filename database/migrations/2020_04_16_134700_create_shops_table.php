<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('licence')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('address');
            $table->string('boss_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('boss_address');
            $table->string('boss_nid');
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->bigInteger('view')->default(0)->index();
            $table->string('link')->nullable();
            $table->text('about')->nullable();
            $table->integer('shipping')->default(0);
            $table->boolean('status')->default(false)->index();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('shops');
    }
}
