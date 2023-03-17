<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('capacity');
            $table->tinyText('room_number');
            $table->float('base_price_per_night');
            $table->foreignId('cleaning_status_id')->default('1');
            $table->boolean('baby_bed_possible');
            $table->foreignId('room_view_id');
            $table->foreignId('room_type_id');
            $table->mediumText('description')->nullable();
            $table->mediumText('status_comment')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
