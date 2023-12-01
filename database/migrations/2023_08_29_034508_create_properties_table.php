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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('landholder_id');
            $table->integer('is_admin')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('primary_image');
            $table->text('secondary_images')->nullable();
            $table->text('description')->nullable();
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('outdoor_area');
            $table->integer('net_area');
            $table->integer('gross_area');
            $table->integer('price');
            $table->string('amenities');
            $table->integer('type');
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
        Schema::dropIfExists('properties');
    }
};
