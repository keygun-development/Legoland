<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends ControllerAbstract
{
    public function register(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email') || !$request->filled('password')) {
            return redirect('/inloggen')->with('errorRegister', 'Geef uw naam, e-mailadres en wachtwoord op.');
        } else {

            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            if (User::where('email', '=', $request->email)->count() > 0) {
                return redirect('/inloggen')->with('errorRegister', 'naam of e-mailadres is al in gebruik');
            } else {
                $newUser->save();
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    return redirect('/account/dashboard')->with('success', 'Bedankt voor uw registratie.');
                }
            }

        }
        return null;
    }

    public function updateUser(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email')) {
            return redirect('/inloggen')->with('error', 'Geef uw naam en e-mailadres op.');
        } else {
            $user = (new \App\Models\User)->where('id', Auth::id());
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect('/account/settings')->with('success', 'Succesvol aangepast.');
        }
    }

    public function login(Request $request)
    {
        if (!$request->filled('email') || !$request->filled('password')) {
            return redirect('/inloggen')->with('errorLogin', 'Geef uw e-mailadres en wachtwoord op.');
        } else {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect('/account/dashboard')->with('success', 'Ingelogd!');
            }

            return redirect("/inloggen")->with('errorLogin', 'Uw e-mailadres en/of wachtwoord is ongeldig.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/inloggen');
    }

    public static function update(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email') || !$request->filled('password') || !$request->filled('role')) {
            return redirect('/admin/accounts')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $user = User::where('id', $request->input('id'));
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role
            ]);
            return redirect('/admin/accounts')->with('success', 'Account is succesvol geupdatet');
        }
    }

    public static function new(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email') || !$request->filled('password') || !$request->filled('role')) {
            return redirect('/admin/accounts')->with('error', 'Niet alle velden zijn ingevuld');
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = $request->role;
            $user->save();
            return redirect('/admin/accounts')->with('success', 'Account is succesvol geupdatet');
        }
    }

    public static function delete(Request $request, $id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect('/admin/accounts')->with('success', 'Account is succesvol verwijderd');
    }
}
