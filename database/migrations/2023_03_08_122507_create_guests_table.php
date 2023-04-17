<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->tinyText('first_name');
            $table->tinyText('last_name');
            $table->foreignId('contact_id')->nullable()->constrained()->onDelete('cascade');
            $table->tinyText('nationality');
            $table->tinyText('passport_number');
            $table->date('date_of_birth');
            $table->boolean('passport_checked');
            $table->boolean('checked_in')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('guests');
    }
};