<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appartement extends Model {
    protected $table = 'appartement';

    protected $fillable = [
        'titre',
        'surface',
        'prix',
        'description',
        'nbPiece',
        'nbChambre',
        'numEtage',
        'adresse',
        'ville',
        'cp',
        'vendu'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function images() {
        return $this->hasMany(Image::class, 'id', 'idAppartement');
    }

    public function messages() {
        return $this->hasMany(Message::class, 'id', 'idAppartement');
    }

    public function options() {
        return $this->belongsToMany(Option::class, 'appartement_options');
    }
}