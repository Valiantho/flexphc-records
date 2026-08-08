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
    Schema::create('o_p_d_visits', function (Blueprint $table) {

        $table->id();

        $table->foreignId('patient_id')
              ->constrained()
              ->cascadeOnUpdate()
              ->restrictOnDelete();

        $table->date('visit_date');

        $table->text('complaint');

        $table->text('examination')->nullable();

        $table->text('diagnosis');

        $table->text('treatment');

        $table->string('outcome');

        $table->foreignId('created_by')
              ->constrained('users')
              ->cascadeOnUpdate()
              ->restrictOnDelete();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opd_visits');
    }
};