<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('orders', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('user_id');
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->string('first_name');
        //     $table->string('last_name');
        //     $table->string('company_name')->nullable();
        //     $table->longText('address');
        //     $table->longText('address_number')->nullable();
        //     $table->string('city');
        //     $table->string('area');
        //     $table->string('phone');
        //     $table->string('payment_method');
        //     $table->string('order_notice')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('orders');
    }
};
