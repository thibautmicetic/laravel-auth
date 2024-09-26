<?php

namespace App\Http\Controllers;

class YoloControler extends Controller
{
    public function publicView()
    {
        return view('yolo.public');
    }

    public function privateView()
    {
        return view('yolo.privateView');
    }
}
