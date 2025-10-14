<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Afficher le formulaire d'inscription
     */
    public function showRegister()
    {
        return view('auth.register');
    }

/**
 * Traiter l'inscription
 */
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:admin,user', // Validation du rôle
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role, // Enregistrement du rôle
    ]);

    // Connecter automatiquement l'utilisateur après inscription
    Auth::login($user);

    // Redirection selon le rôle
    if ($user->role === 'admin') {
        return redirect()->route('dashboardAdmin')->with('success', 'Inscription réussie ✅');
    }
        return redirect()->route('user.dashboard')->with('success', 'Inscription réussie ✅');
    }

    /**
     * Afficher le formulaire de connexion
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('user.dashboard'); // ou le nom correct de la vue
    }
 

    public function infirmerie()
    {
        $medicaments = Medicament::all();
        return view('user.infirmerie', compact('medicaments'));
    }

    /**
     * Traiter la connexion
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
                if($user->role === 'admin'){
                    return redirect()->intended(route('dashboardAdmin'))->with('success', 'Connexion réussie ✅');
                }else{
                    return redirect()->intended(route('user.dashboard'))->with('success', 'Connexion réussie ✅');
                }
        }

        return back()->withErrors([
            'email' => 'Identifiants invalides',
        ])->onlyInput('email');
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Déconnexion réussie👋');
    }
}
