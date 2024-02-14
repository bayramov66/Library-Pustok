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
            $table->unsignedInteger('total_count');
            $table->double('total_price');
            $table->unsignedBigInteger('user_id');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('state');
            $table->string('zip_code');
            $table->string('order_number');
            $table->text('order_notes')->nullable();
            $table->boolean('is_accepted')->nullable();
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
