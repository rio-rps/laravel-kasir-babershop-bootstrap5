<?php

namespace App\Http\Controllers;

use App\Models\PotonganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class PotonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'title' => 'POTONGAN',
            //'result' => PotonganModel::all(),
        ];
        return view('data/potongan/view')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        return  DataTablesDataTables::of(PotonganModel::query())
            ->addColumn('action', 'data.potongan.action')
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->ajax()) {
            return view('data.potongan.formadd');
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_pot' => 'required|max:225',
                'ket_pot' => 'required',
            ], [
                'nm_pot.required' => 'Nama Potongan Tidak Boleh Kosong',
                'nm_pot.max' => 'Nama Potongan Maksimal 225 Karakter',
                'ket_pot.required' => 'Keterangan Potongan Tidak Boleh Kosong',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = PotonganModel::create([
                    'nm_pot'     => $r->nm_pot,
                    'ket_pot'     => $r->ket_pot,
                ]);
                return response()->json(['success' => 'Data berhasil disimpan']);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $row = PotonganModel::where('id_pot', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
            ];
            return view('data.potongan.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'nm_pot' => 'required|max:225',
            'ket_pot' => 'required',
        ], [
            'nm_pot.required' => 'Nama Potongan Tidak Boleh Kosong',
            'nm_pot.max' => 'Nama Potongan Maksimal 225 Karakter',
            'ket_pot.required' => 'Keterangan Potongan Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        } else {
            PotonganModel::where('id_pot', $id)->update([
                'nm_pot' => $r->nm_pot,
                'ket_pot' => $r->ket_pot,
            ]);
            return response()->json(['success' => 'Data berhasil diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r)
    {
        if (request()->ajax()) {
            PotonganModel::where('id_pot', $r->id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
