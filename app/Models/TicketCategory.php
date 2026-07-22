<?php

namespace App\Models;

use App\Enums\TicketCategoryType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketCategory extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'type', 'name', 'base_price', 'capacity', 'reserved_count'];

    protected $casts = [
        'type' => TicketCategoryType::class,
        'base_price' => 'decimal:2',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Vérifie la disponibilité des places (Principe d'encapsulation / Fail Fast)
     */
    public function hasAvailableTickets(int $requestedQuantity): bool
    {
        return ($this->reserved_count + $requestedQuantity) <= $this->capacity;
    }
}