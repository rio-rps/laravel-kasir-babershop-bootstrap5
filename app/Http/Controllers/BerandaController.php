<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        return view('layout.beranda')->with([
            // 'user' => Auth::user(),
        ]);
    }
}
