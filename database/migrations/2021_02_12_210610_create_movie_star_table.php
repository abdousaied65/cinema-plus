<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieStarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_star', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')
                ->constrained('movies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('star_id')
                ->constrained('stars')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('movie_star');
    }
}
