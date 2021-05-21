<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->binary('poster');
            $table->string('runtime');
            $table->string('overview');
            $table->timestamp('release_year');
            $table->string('is_popular',10);
            $table->string('is_trending',10);
        });
        Schema::table('casts',function(Blueprint $table){
            $table->unsignedInteger('movie_id');
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
        Schema::dropIfExists('movies');
    }
}
//SELECT mov_title, act_fname, act_lname, role
//FROM movie
//JOIN movie_cast
//  ON movie_cast.mov_id=movie.mov_id
//JOIN actor
//  ON movie_cast.act_id=actor.act_id
//WHERE actor.act_id IN (
//    SELECT act_id
//FROM movie_cast
//GROUP BY act_id HAVING COUNT(*)>=2);
