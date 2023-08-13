<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tracking_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->mediumText('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('phone');
            $table->mediumText('order_notes')->nullable();
            $table->string('status_message');
            $table->string('payment_mode');
            $table->string('payment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
