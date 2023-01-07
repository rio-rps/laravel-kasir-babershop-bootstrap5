<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\SatuanModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SatuanController extends Controller
{


    public function index()
    {

        // return view('data/satuan/view')->with([
        //     'results' => SatuanModel::get(),
        // ]);
        // $dt = DataTables::of(SatuanModel::query())->make(true);
        $data = [
            'title' => 'SATUAN',
            //'result' => $dt,
        ];
        return view('data/satuan/view')->with($data);
    }

    public function show()
    {
        return  DataTables::of(SatuanModel::query())
            ->addColumn('action', 'data.satuan.action')
            ->make(true);
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
            $validator = Validator::make($r->all(), [
                'nm_satuan' => 'required|max:225',
            ], [
                'nm_satuan.required' => 'Nama Satuan Tidak Boleh Kosong',
                'nm_satuan.max' => 'Nama Satuan Maksimal 225 Karakter',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = SatuanModel::create([
                    'nm_satuan'     => $r->nm_satuan,
                ]);
                return response()->json(['success' => 'Data berhasil disimpan']);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function destroy(Request $r)
    {
        if (request()->ajax()) {
            //   return $r->id;
            //$dt = SatuanModel::find($r->id);
            //echo $dt->nm_satuan;


            SatuanModel::where('id_satuan', $r->id_satuan)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit($id_satuan)
    {
        if (request()->ajax()) {
            $dt = SatuanModel::where('id_satuan', $id_satuan)->first();
            $data = [
                'id_satuan' => $id_satuan,
                'nm_satuan' => $dt->nm_satuan,
            ];
            return view('data.satuan.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function update(Request $r, $id_satuan)
    {
        $validator = Validator::make($r->all(), [
            'nm_satuan' => 'required|max:225',
        ], [
            'nm_satuan.required' => 'Nama Satuan Tidak Boleh Kosong',
            'nm_satuan.max' => 'Nama Satuan Maksimal 225 Karakter',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        } else {
            SatuanModel::where('id_satuan', $id_satuan)->update([
                'nm_satuan' => $r->nm_satuan,
            ]);
            return response()->json(['success' => 'Data berhasil diupdate']);
        }
    }
}
