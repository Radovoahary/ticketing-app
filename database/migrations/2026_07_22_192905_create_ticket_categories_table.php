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
    Schema::create('ticket_categories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('event_id')->constrained()->cascadeOnDelete();
        $table->string('type'); // Stockera la valeur de l'Enum (standard, vip, student)
        $table->string('name'); // Nom d'affichage ex: "Place VIP Premier Rang"
        $table->decimal('base_price', 8, 2); // Prix hors promotion / stratégie
        $table->integer('capacity'); // Capacité totale
        $table->integer('reserved_count')->default(0); // Capacité actuellement réservée
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_categories');
    }
};
