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
        Schema::table('parks', function (Blueprint $table) {
            $table->string('plan')->nullable();
            $table->date('udpate_plan_at')->nullable();
            $table->date('next_payment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parks', function (Blueprint $table) {
            $table->dropColumn('plan');
            $table->dropColumn('udpate_plan_at');
            $table->dropColumn('next_payment_date');
        });
    }
};
