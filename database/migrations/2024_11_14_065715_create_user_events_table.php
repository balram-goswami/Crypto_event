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
        Schema::create('user_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('event_name');
            $table->date('event_date');
            $table->string('guest_names')->nullable();
            $table->string('speaker_name')->nullable();
            $table->string('payment_one')->nullable();
            $table->string('payment_two')->nullable();
            $table->string('location');
            $table->foreignId('event_type')->constrained()->onDelete('cascade');
            $table->integer('type')->comment("1=>user,2=>admin,");
            $table->integer('status')->default(1)->comment("1=>pending,2=>approved,3=>rejected ");
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_events');
    }
};
