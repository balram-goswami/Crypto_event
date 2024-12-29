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
        Schema::create('payment_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->unique();
            $table->integer('status')->default(1)->comment("1=>pending,2=>approved,3=>rejected ");
            $table->integer('type')->comment("1=>Pay now,2=>Pay With Crypto ");
            $table->integer('event_status')->default(1)->comment("1=>Panding,2=>Complete ");
            $table->timestamp('payment_date')->nullable(); // Payment date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_history');
    }
};
