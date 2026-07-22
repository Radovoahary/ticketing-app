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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->foreignId('event_id')->constrained()->cascadeOnDelete();
        $table->string('status')->default(\App\Enums\BookingStatus::DRAFT->value);
        $table->decimal('total_amount', 8, 2)->default(0.00);
        $table->string('pricing_strategy_applied')->nullable(); // Garde une trace de la stratégie (ex: EarlyBird)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
