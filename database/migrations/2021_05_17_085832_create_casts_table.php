<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('cascade');
            $table->string('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casts', function($table) {
            $table->dropColumn('id');
            $table->dropColumn('role');
        });
    }
}
