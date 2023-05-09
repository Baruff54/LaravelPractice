<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Option;
use App\Models\Appartement;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewAppartRequest;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    public function showAll() {
        $appart = Appartement::where("vendu", 0)->paginate(8);
        return view('appartement.showAll', ['apparts' => $appart]);
    }

    public function show(Appartement $appart) {
        return view('appartement.show', ['appart' => $appart]);
    }

    public function showMy() {
        $appart = Auth::user()->appartement;

        return view('appartement.showMy', ['apparts' => $appart]);
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
        $appart->save();

        $appart->options()->sync($request->validated('options'));
        
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

    public function delete(Request $request) {
        $appart = Appartement::find($request->input('id'));

        if($appart->user->id === Auth::user()->id)
            $appart->delete();
        else
            return back()->with('error', "Une erreur est survenue.");

        return back()->with('success', 'Action effectué avec succès.');
    }
}
