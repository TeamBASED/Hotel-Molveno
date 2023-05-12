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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("reservation_id");
            $table->timestamps();
            $table->string("payment_method_id");
            $table->float("value_added_tax");
            $table->float("final_amount");
            $table->mediumText("description");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('invoices');
    }
};