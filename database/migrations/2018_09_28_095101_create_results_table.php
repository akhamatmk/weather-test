<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->length(5)->unsigned();
            $table->bigInteger('weather_id');
            $table->string('weather_state_name');
            $table->string('weather_state_abbr');
            $table->string('wind_direction_compass');
            $table->string('min_temp');
            $table->string('wind_speed');
            $table->string('wind_direction');
            $table->string('air_pressure');
            $table->string('humidity');
            $table->string('visibility');
            $table->string('predictability');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')->references('id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
