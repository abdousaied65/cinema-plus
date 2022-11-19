<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_room', function (Blueprint $table) {
            $table->id();
            $table->foreignId('show_id')
                ->constrained('shows')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('room_id')
                ->constrained('rooms')
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
        Schema::dropIfExists('show_room');
    }
}
