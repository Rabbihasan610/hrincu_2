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
        Schema::create('our_service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_service_id')->constrained()->onDelete('cascade');
            $table->string('organization_name');
            $table->text('additional_notes')->nullable();
            $table->json('form_data')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_service_requests');
    }
};
