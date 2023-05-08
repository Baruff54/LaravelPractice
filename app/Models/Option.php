<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {
    protected $table = 'options';
    public $timestamps = false;

    protected $fillable = [
        'nom'
    ];

    public function appartement() {
        return $this->belongsToMany(Appartement::class, 'appartement_options', 'options', 'appartement');
    }
}