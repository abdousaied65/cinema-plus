<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveGiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_gift', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('recipient_name');
            $table->string('recipient_email');
            $table->string('recipient_number');
            $table->text('message');
            $table->foreignId('card_id')
                ->constrained('gifts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('reserve_gift');
    }
}
