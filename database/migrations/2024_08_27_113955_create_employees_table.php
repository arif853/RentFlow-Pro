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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->unique();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('other_documents_type')->nullable();
            $table->string('documents_photo')->nullable();
            $table->foreignId('designation_id')->constrained('designations')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('signature')->nullable();
            $table->enum('status', ['1', '0']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
