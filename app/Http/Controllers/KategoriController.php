<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            //'user' => Auth::user(),
        ];
        return view('data/kategori/view')->with($data);
    }
}
