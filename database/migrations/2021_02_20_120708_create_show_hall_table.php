<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowHallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_hall', function (Blueprint $table) {
            $table->id();
            $table->foreignId('show_id')
                ->constrained('shows')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('room_id')
                ->constrained('rooms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('hall_id')
                ->constrained('halls')
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
        Schema::dropIfExists('show_hall');
    }
}
