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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

        // Identification
            $table->string('card_number', 30)->unique();

        // Personal Information
            $table->string('surname');
            $table->string('first_name');
            $table->string('other_name')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('date_of_birth')->nullable();
            $table->unsignedTinyInteger('age');

        // Contact Information
            $table->string('phone', 20)->nullable();
            $table->text('address');
            $table->string('occupation')->nullable();

        // Emergency Contact
            $table->string('next_of_kin')->nullable();
            $table->string('next_of_kin_phone', 20)->nullable();

        // Record Status
            $table->boolean('status')->default(true);

        // Audit Trail
            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

        // Soft Deletes
            $table->softDeletes();

        // System
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
