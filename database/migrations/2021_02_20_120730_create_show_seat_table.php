<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_seat', function (Blueprint $table) {
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
            $table->string('day');
            $table->date('date');
            $table->string('time');
            $table->string('seat');
            $table->string('ticket_price');
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
        Schema::dropIfExists('show_seat');
    }
}
