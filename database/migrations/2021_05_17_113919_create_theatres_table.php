<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheatresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theatres', function (Blueprint $table) {
            $table->id();
            $table->string('theatre_name');

            $table->integer('seats_no')->default(100);
        });
//        Schema::table('theatres', function (Blueprint $table) {
//            $table->foreign('city_id')->references('id')->on('cities');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theatres');
    }
}
