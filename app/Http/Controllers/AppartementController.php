<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Option;
use App\Models\Appartement;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewAppartRequest;

class AppartementController extends Controller
{
    public function showAll() {
        $appart = Appartement::where("vendu", 0)->paginate(8);
        return view('appartement.showAll', ['apparts' => $appart]);
    }

    public function show(Appartement $appart) {
        return view('appartement.show', ['appart' => $appart]);
    }

    public function create() {
        $options = Option::all();
        return view('appartement.create', ['options' => $options]);
    }

    public function store(NewAppartRequest $request) {
        $data = $request->validated();

        $appart = new Appartement();
        $appart->idUser = Auth::id();
        $appart->titre = $data['titre'];
        $appart->surface = $data['surface'];
        $appart->prix = $data['prix'];
        $appart->description = $data['description'];
        $appart->nbPiece = $data['nbPiece'];
        $appart->nbChambre = $data['nbChambre'];
        $appart->numEtage = $data['numEtage'];
        $appart->adresse = $data['adresse'];
        $appart->ville = $data['ville'];
        $appart->cp = $data['cp'];
        $appart->options()->sync($request->validated('options'));
        $appart->save();
        
        $img = $request->validated('image');
        if($img !== null && !$img->getError()) {
            $imagePath = $img->store('appart', 'public');
            $image = new Image();
            $image->idAppartement = $appart->id;
            $image->lien = $imagePath;
            $image->save();
        }

        return redirect()->route('appart.show', ['appart' => $appart->id]);
    }
}
