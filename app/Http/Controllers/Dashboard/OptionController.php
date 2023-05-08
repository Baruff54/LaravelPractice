<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\OptionRequest;

class OptionController extends Controller
{
    public function show() {
        $opt = Option::all();

        return View('dashboard.option', ['options' => $opt]);
    }

    public function store(OptionRequest $request) {
        $option = new Option();
        $option->nom = $request->validated('name');
        $option->save();

        return back();
    }

    public function delete(Request $request) {
        $appart = Option::find($request->input('id'));

        $appart->delete();

        return back();
    }
}