<?php
namespace App\Enums;

enum BookingStatus: string
{
    case DRAFT = 'draft'; //Panier
    case CONFIRMED = 'confirmed'; //Confirmé
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded'; //Remboursé

    public function label(): string
    {
        return match($this) {
            self::DRAFT => 'Panier / En attente',
            self::CONFIRMED => 'Confimée',
            self::PAID => 'Payée',
            self::CANCELLED => 'Annulée',
            self::REFUNDED => 'Remboursée',
        };
    }
}