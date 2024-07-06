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
        Schema::create('guardian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patientID')->constrained('patients','id');
            $table->string('guardian_name');
            $table->string('relation');
            $table->text('g_phone');
            $table->string('g_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian');
    }
};
