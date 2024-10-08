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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->constrained('buildings');
            $table->foreignId('asset_id')->constrained('assets');
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('customer_id')->constrained('customers');
            $table->date('availability_date');
            $table->string('month');
            $table->string('notes')->nullable();
            $table->boolean('is_confirm')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
