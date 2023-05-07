<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {
    protected $table = 'messages';

    protected $fillable = [
        'idAppartement',
        'idUserInteret',
        'idUserMessage',
        'message'
    ];

    public function appartement() {
        return $this->belongsTo(Appartement::class, 'idAppartement');
    }

    public function userInterest() {
        return $this->belongsTo(User::class, 'idUserInterest');
    }

    public function UserMessages() {
        return $this->belongsTo(User::class, 'idUserMessage');
    }
}