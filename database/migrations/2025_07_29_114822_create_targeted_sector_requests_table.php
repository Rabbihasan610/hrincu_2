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
        Schema::create('targeted_sector_requests', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->string('business_type_sector');
            $table->string('marital_status')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('city_region')->nullable();
            $table->string('email_address')->nullable();
            $table->string('current_occupation')->nullable();
            $table->decimal('average_monthly_income', 10, 2)->nullable();
            $table->json('requested_services')->nullable();
            $table->text('description_of_need')->nullable();
            $table->date('expected_timeframe')->nullable();
            $table->string('preferred_communication_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targeted_sector_requests');
    }
};
