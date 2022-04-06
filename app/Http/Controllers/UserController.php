<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email') || !$request->filled('password')) {
            return redirect('/inloggen')->with('error', 'Geef uw naam, e-mailadres en wachtwoord op.');
        } else {
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            $newUser->save();
            return redirect('/account/dashboard')->with('success', 'Bedankt voor uw registratie.');
        }
    }

    public function login(Request $request)
    {
        if (!$request->filled('email') || !$request->filled('password')) {
            return redirect('/inloggen')->with('error', 'Geef uw e-mailadres en wachtwoord op.');
        } else {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect('/account/dashboard')->with('success', 'Ingelogd!');
            }

            return redirect("/inloggen")->with('error', 'Uw e-mailadres en/of wachtwoord is ongeldig.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/inloggen');
    }
}
