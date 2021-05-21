<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screening', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('theatre_id');
            $table->unsignedInteger('movie_id');
            $table->dateTime('screening_time');
        });
        Schema::table('screening', function (Blueprint $table) {
            $table->foreign('theatre_id')->references('id')->on('theatres')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screening');
    }
}
