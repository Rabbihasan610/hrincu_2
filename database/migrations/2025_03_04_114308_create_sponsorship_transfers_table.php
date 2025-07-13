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
        Schema::create('sponsorship_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('current_position')->nullable();
            $table->string('company_name')->nullable();
            $table->string('age')->nullable();
            $table->string('nationality')->nullable();
            $table->text('message')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=Pending, 1=Approved, 2=Rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorship_transfers');
    }
};
