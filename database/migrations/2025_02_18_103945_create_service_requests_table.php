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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id');
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('state_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('is_saved')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1 = pending, 2 = approved, 3 = rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
