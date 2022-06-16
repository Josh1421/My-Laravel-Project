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
        Schema::create('check_in_lists', function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->string('guest_name');
            $table->string('guest_contact');
            $table->string('checkin_date');
            $table->string('checkout_date');
            $table->string('days');
            $table->string('sub_total');
            $table->string('down_payment');
            $table->string('total_balance');
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
        Schema::dropIfExists('check_in_lists');
    }
};
