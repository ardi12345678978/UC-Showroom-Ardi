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
        // Create trucks table schema for the Truck model.
        Schema::create('trucks', function (Blueprint $table) {
            $table->id('truck_id');
            $table->integer('wheel_count')->default(4);
            $table->integer('cargo_area_size')->default(0);
            $table->foreignId('vehicle_id')->constrained('vehicles', 'vehicle_id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
