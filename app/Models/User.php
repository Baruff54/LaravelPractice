<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'tel',
        'isAdmin'
    ];

    public function appartement() {
        return $this->hasMany(Appartement::class, 'idUser');
    }

    public function messageInterest() {
        return $this->hasMany(Message::class, 'idUserInterest');
    }

    public function messageGive() {
        return $this->hasMany(Message::class, 'idUserMessage');
    }
}