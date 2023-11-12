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
        // Create cars table schema for the Car model.
        Schema::create('cars', function (Blueprint $table) {
            $table->id('car_id');
            $table->string('fuel_type')->default('Gasoline');
            $table->float('trunk_size_car')->default(0);
            $table->foreignId('vehicle_id')->constrained('vehicles', 'vehicle_id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
