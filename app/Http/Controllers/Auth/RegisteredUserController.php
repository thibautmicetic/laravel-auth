<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Personne;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Client::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Client::create([
            'nom' => $request->name,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
        ]);

        Personne::create([
            'name' => $request->name,
            'userId' => $user->id
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('yoloPrivate', absolute: false));
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
}
