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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('building_name');
            $table->enum('building_type', ['commercial', 'residential', 'teen-sheed', 'semi-paka', 'others']); // Building type
            $table->integer('total_floor')->nullable();
            $table->string('address')->nullable();
            $table->string('building_code')->unique()->nullable();
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('employee_id')->nullable()->constrained('employees');
            $table->string('security_guard_name')->nullable();
            $table->string('guard_contact_number')->nullable();
            $table->time('gate_open_time')->nullable();
            $table->time('gate_close_time')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
