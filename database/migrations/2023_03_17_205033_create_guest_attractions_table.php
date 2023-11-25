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
        Schema::create('guest_attractions', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('guest_id');
            $table->foreignId('price_attraction_id')->constrained();
            $table->time('entry_time');
            $table->time('departure_time');
            $table->boolean('is_active')->default(true);
            //$table->integer('minutes')->description('tiempo en minutos que pasan los niños en la atracción');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_attractions');
    }
};
