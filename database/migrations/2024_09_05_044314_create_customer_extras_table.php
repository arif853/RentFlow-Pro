<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**database/migrations/2024_09_05_044314_create_customer_extras_table.php
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('members')->nullable();
            $table->enum('home_maid',['Yes','No'])->nullable();
            $table->string('home_maid_name')->nullable();
            $table->string('home_maid_phone')->nullable();
            $table->text('home_maid_address')->nullable();
            $table->string('home_maid_nid')->nullable();
            $table->string('home_maid_nidfront')->nullable();
            $table->string('home_maid_nidback')->nullable();
            $table->enum('driver',['Yes','No'])->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_phone')->nullable();
            $table->text('driver_address')->nullable();
            $table->string('driver_nid')->nullable();
            $table->string('driver_nidfront')->nullable();
            $table->string('driver_nidback')->nullable();
            $table->string('previous_householder_name')->nullable();
            $table->string('previous_householder_phone')->nullable();
            $table->text('previous_house_address')->nullable();
            $table->string('left_reason')->nullable();
            $table->string('actual_rent')->nullable();
            $table->enum('advance_amount_type',['Yes','No'])->nullable();
            $table->string('advance_amount')->nullable();
            $table->enum('adjustable_amout_type',['Yes','No'])->nullable();
            $table->string('adjustable_amount')->nullable();
            $table->date('collection_date')->nullable();
            $table->date('collection_last_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_extras');
    }
};
