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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->string('asset_code');
            $table->foreignId('building_id')->constrained('buildings')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('floor_id')->constrained('floors');
            $table->string('gas_type')->nullable();
            $table->decimal('gas_owner_part_amount', 8, 2)->nullable();
            $table->decimal('gas_rental_part_amount', 8, 2)->nullable();
            $table->string('lift_facility')->nullable();
            $table->string('electricity_type')->nullable();
            $table->decimal('e_owner_part_amount', 8, 2)->nullable();
            $table->decimal('e_rental_part_amount', 8, 2)->nullable();
            $table->string('water_type')->nullable();
            $table->decimal('water_owner_part_amount', 8, 2)->nullable();
            $table->decimal('water_rental_part_amount', 8, 2)->nullable();
            $table->string('unit_size')->nullable();
            $table->string('unit_view')->nullable();
            $table->decimal('monthly_rent', 10, 2)->nullable();
            $table->decimal('service_charge', 10, 2)->nullable();
            $table->decimal('others_charge', 10, 2)->nullable();
            $table->date('available_from')->nullable();
            $table->text('others_description')->nullable();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade')->nullable();
            $table->enum('status', ['1', '0'])->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
