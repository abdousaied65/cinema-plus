<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_day', function (Blueprint $table) {
            $table->id();
            $table->foreignId('show_id')
                ->constrained('shows')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('day');
            $table->date('date');
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
        Schema::dropIfExists('show_day');
    }
}
