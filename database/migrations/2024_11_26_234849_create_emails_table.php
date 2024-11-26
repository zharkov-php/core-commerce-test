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
        Schema::create('emails', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('email_address'); // Email address (required)
            $table->text('message'); // Message (required)
            $table->string('attachment')->nullable(); // Path to the file (optional)
            $table->string('attachment_filename')->nullable(); // File name (optional)
            $table->enum('status', ['pending', 'sent', 'failed'])->default('pending'); // Status
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
