<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnershipRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnership_requests', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key

            // Organization Information
            $table->string('organization_name');
            $table->string('organization_type');
            $table->string('representative_name');
            $table->string('job_title');
            $table->string('email_number');
            $table->string('mobile_number', 20); // Limiting mobile number length

            // Partnership Objectives
            // Option 1: Store as comma-separated string (if you chose implode in controller)
            // $table->text('objectives')->nullable();

            // Option 2: Store as JSON (RECOMMENDED if using json_encode in controller)
            $table->json('objectives')->nullable();

            // Initiative or Project Details
            $table->text('project_description');

            // Proposed Partnership Duration
            $table->enum('partnership_duration', ['short', 'medium', 'long']);

            // Additional Notes
            $table->text('additional_notes')->nullable();

            $table->timestamps(); // `created_at` and `updated_at` columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partnership_requests');
    }
}