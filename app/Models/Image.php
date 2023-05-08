<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model {
    protected $table = 'images';
    public $timestamps = false;

    protected $fillable = [
        'idAppartement',
        'lien'
    ];

    public function appartement() {
        return $this->belongsTo(Appartement::class, 'idAppartement');
    }

    public function getUrl() {
        return Storage::disk('public')->url($this->lien);
    }
}