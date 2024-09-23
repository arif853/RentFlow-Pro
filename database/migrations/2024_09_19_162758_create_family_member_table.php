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
        Schema::create('family_member', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_extra_id')->constrained('customer_extras')->onDelete('cascade');
            $table->string('member_name')->nullable();
            $table->string('member_gender')->nullable();
            $table->string('member_relation')->nullable();
            $table->string('member_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_member');
    }
};
