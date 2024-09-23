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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->foreignId('building_id')->constrained('buildings')->onDelete('cascade')->nullable();
            $table->foreignId('room_type_id')->constrained('room_types')->nullable();
            $table->integer('room_size')->nullable();
            $table->string('room_image')->nullable();
            $table->boolean('electricity')->default(false);
            $table->boolean('aircondition')->default(false);
            $table->boolean('attach_toilet')->default(false);
            $table->boolean('attach_baranda')->default(false);
            $table->boolean('has_window')->default(false);
            $table->boolean('others')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
