<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningTable extends Migration
{

    public function up()
    {
        Schema::create('screening', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theatre_id');
            $table->foreign('theatre_id')->references('id')->on('theatres')->onDelete('cascade');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->timestamp('screening_time');
        });
    }

    public function down()
    {
        Schema::dropIfExists('screening');
    }
}
