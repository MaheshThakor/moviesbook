<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatReservedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_reserved', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('seat_id');
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('screening_id');
        });
        Schema::table('seat_reserved', function (Blueprint $table) {
            $table->foreign('seat_id')->references('id')->on('seat')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservation')->onDelete('cascade');
            $table->foreign('screening_id')->references('id')->on('screening')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seat_reserved');
    }
}
