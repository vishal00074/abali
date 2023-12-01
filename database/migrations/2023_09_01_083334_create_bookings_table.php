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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bookingID');
            $table->integer('property_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->datetime('checkin')->nullable();
            $table->datetime('checkout')->nullable();
            $table->string('guest')->nullable();
            $table->string('price')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('bookings');
    }
};
