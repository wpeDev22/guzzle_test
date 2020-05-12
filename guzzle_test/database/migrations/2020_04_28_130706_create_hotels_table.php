<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_name');
            $table->string('hotel_phone');
            $table->string('hotel_image');
            $table->string('hotel_address');
            $table->string('hotel_email');
            $table->text('hotel_website');
            $table->unsignedInteger('cities_id');
            $table->foreign('cities_id')->references('id')->on('cities');
            $table->unsignedInteger('townships_id');
            $table->foreign('townships_id')->references('id')->on('townships');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
