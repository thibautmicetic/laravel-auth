<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Support\Facades\Auth;

class YoloControler extends Controller
{
    public function publicView()
    {
        return view('yolo.public');
    }

    public function privateView()
    {
        $personne = Personne::where('userId', Auth::user()->id)->first();
        return view('yolo.privateView', ['personne' => $personne]);
    }

    public function glowUpAsAdmin()
    {
        $user = Auth::user();
        $user->roles()->sync([1]);
        return redirect()->route('dashboard');
    }

    public function roles()
    {
        $roles = Auth::user()->roles;
        return view('yolo.roles', ['roles' => $roles]);
    }
}
