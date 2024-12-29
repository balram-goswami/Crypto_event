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
        Schema::create('event_leads', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('event_id'); // Correct spelling of 'integer'
            $table->string('name')->nullable(); // Nullable string column
            $table->string('email')->unique(); // Unique email column
            $table->string('phone')->unique()->nullable(); // Nullable and unique phone column
            $table->text('description')->nullable(); // Correct spelling of 'description'
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_leads');
    }
};
