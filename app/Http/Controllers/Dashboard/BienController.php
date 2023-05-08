<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use App\Models\Appartement;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function show() {
        $opt = Appartement::all(['id', 'titre']);

        return View('dashboard.appart', ['appart' => $opt]);
    }

    public function delete(Request $request) {
        $appart = Appartement::find($request->input('id'));

        $appart->delete();

        return back();
    }
}