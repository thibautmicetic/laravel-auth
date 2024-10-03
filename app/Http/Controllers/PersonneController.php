<?php

namespace App\Http\Controllers;

use App\Models\Personne;

class PersonneController extends Controller
{
    public function show(Personne $personne)
    {
        return view('personne', ['personne' => $personne]);
    }
}
