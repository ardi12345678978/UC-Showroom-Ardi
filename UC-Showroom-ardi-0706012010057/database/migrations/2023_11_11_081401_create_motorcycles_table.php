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
        // Create motorcycles table schema for the Motorcycle model.
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id('motorcycle_id');
            $table->float('trunk_size_motorcycle')->default(0);
            $table->float('fuel_capacity')->default(1);
            $table->foreignId('vehicle_id')->constrained('vehicles', 'vehicle_id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycles');
    }
};
