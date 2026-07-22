<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class, // Cast automatique vers l'Enum
        ];
    }

    // Méthodes d'aide bien encapsulées pour vérifier les rôles
    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    public function isOrganizer(): bool
    {
        return $this->role === UserRole::ORGANIZER;
    }

    public function isParticipant(): bool
    {
        return $this->role === UserRole::PARTICIPANT;
    }
}