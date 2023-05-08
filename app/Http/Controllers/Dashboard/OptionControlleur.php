<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Option;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class OptionController extends Controller
{
    public function show() {
        $opt = Option::all();

        return View('dashboard.option', ['options' => $opt]);
    }
}