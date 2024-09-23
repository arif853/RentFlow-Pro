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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('client_email')->nullable();
            $table->string('father_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('education_status')->nullable();
            $table->string('occupation');
            $table->string('job_place_name')->nullable();
            $table->string('job_place_address')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('other_document')->nullable();
            $table->string('document_photo')->nullable();
            $table->enum('marriage_status', ['Married', 'Unmarried'.'Divorced'])->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('spouse_nid')->nullable();
            $table->string('s_nid_front')->nullable();
            $table->string('s_nid_back')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
