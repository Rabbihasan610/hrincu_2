<?php

use App\Constants\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('training_and_qualification_requests', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->foreignId('city_id')->constrained('cities');
            $table->string('industry_sector');
            $table->string('full_name_applicant');
            $table->string('email_number');
            $table->string('mobile_number')->nullable();
            $table->json('requested_services')->nullable();
            $table->string('target_group')->nullable();
            $table->integer('expected_participants')->nullable();
            $table->string('training_format')->nullable();
            $table->boolean('suggested_duration')->nullable();
            $table->string('preferred_training_language')->nullable();
            $table->date('expected_start_date')->nullable();
            $table->text('additional_notes')->nullable();
            $table->enum('status', [Status::PENDING, Status::APPROVED, Status::REJECT])->default(Status::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_and_qualification_requests');
    }
};
