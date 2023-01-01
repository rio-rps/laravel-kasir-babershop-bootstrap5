<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\SatuanModel;
use Illuminate\Http\Request;

class SatuanController extends Controller
{


    public function index()
    {

        $data = [
            //'user' => Auth::user(),
        ];
        return view('data/satuan/view')->with($data);
    }

    public function create()
    {
        if (request()->ajax()) {
            return view('data.satuan.formadd');
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function store(Request $r)
    {
        if (request()->ajax()) {

            SatuanModel::create([
                'nm_satuan' => $r->nm_satuan,
            ]);


            $json = [
                'success' => "Data berhasil disimpan",
            ];

            echo json_encode($json);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    // public function formadd()
    // {
    //     echo "aaaaaaaaaaa";
    // }

    // public function show(SatuanModel $satuanModel)
    // {
    //     return "showw";
    // }
}
