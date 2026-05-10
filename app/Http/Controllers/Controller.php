<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('welcome');
    }

    public function booth()
    {
        $frames = \App\Models\Frame::all();
        return view('booth', compact('frames'));
    }

    public function frame()
    {
        $frames = \App\Models\Frame::all();
        return view('frame', compact('frames'));
    }
}
