<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    protected $table = 'images';

    protected $fillable = [
        'idAppartement',
        'lien'
    ];

    public function appartement() {
        return $this->belongsTo(Appartement::class, 'idAppartement');
    }
}