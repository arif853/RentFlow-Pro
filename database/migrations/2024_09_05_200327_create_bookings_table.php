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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('building_id')->constrained('buildings')->onDelete('cascade');
            $table->foreignId('floor_id')->constrained('floors')->onDelete('cascade');
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
