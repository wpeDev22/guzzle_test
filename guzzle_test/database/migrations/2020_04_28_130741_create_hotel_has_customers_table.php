<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelHasCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_has_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hotels_id');
            $table->foreign('hotels_id')->references('id')->on('hotels');
            $table->unsignedInteger('hotels_cities_id');
            $table->foreign('hotels_cities_id')->references('id')->on('cities');
            $table->unsignedInteger('hotels_townships_id');
            $table->foreign('hotels_townships_id')->references('id')->on('townships');
            $table->unsignedInteger('customers_id');
            $table->foreign('customers_id')->references('id')->on('customers');
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
        Schema::dropIfExists('hotel_has_customers');
    }
}
