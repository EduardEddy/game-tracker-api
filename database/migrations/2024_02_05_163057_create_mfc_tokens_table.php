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
        Schema::create('fmc_tokens', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('token')->unique();
            $table->boolean('is_login')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('park_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fmc_tokens');
    }
};
