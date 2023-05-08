<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login() {
        return view('user.login');
    }

    public function doLogin(Request $request) {
        $credentials = $request->all(['email', 'password']);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->with('error', 'Identifiant incorrect.');
    }

    public function signUp() {
        return view('user.signUp');
    }

    public function doSignUp(SignUpRequest $request) {
        $user = new User;

        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->tel = $request->input('telephone');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect()->route('login');
    }

    public function logOut() {
        Auth::logout();

        return redirect()->route('accueil');
    }
}
