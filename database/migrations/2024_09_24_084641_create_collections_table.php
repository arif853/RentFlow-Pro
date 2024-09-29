<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('collections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('building_id')->constrained('buildings');
                $table->foreignId('asset_id')->constrained('assets');
                $table->foreignId('employee_id')->constrained('employees');
                $table->date('collection_date');
                $table->string('month')->nullable();
                $table->decimal('payable_amount', 10, 2);
                $table->decimal('water_amount', 10, 2)->nullable();
                $table->decimal('gas_amount', 10, 2)->nullable();
                $table->decimal('electricity_amount', 10, 2)->nullable();
                $table->decimal('due_amount', 10, 2)->nullable();
                $table->decimal('collection_amount', 10, 2)->nullable();
                $table->string('water_type')->nullable();
                $table->string('electricity_type')->nullable();
                $table->string('gas_type')->nullable();
                $table->timestamps();
            }

        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('collections');
    }
}

;
