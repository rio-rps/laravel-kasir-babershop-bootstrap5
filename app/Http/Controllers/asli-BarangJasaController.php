<?php

namespace App\Http\Controllers;

use App\Models\BarangJasaModel;
use App\Models\KategoriModel;
use App\Models\SatuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class BarangJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_kategori = request()->kat;
        $kategori = KategoriModel::find($id_kategori);
        $barangjasa =  DB::table('cpar_003_barangjasa')
            ->where('cpar_003_barangjasa.id_kategori', '=', $id_kategori)
            ->join('cpar_001_satuan', 'cpar_001_satuan.id', '=', 'cpar_003_barangjasa.id_satuan')
            ->select('*')
            ->get();
        $data = [
            'title' => 'KATEGORI ' . Str::upper($kategori->nm_kategori),
            'barangjasa'  => $barangjasa,
            'id_kategori' => $id_kategori,
            'status_layanan' => $kategori->status_layanan,
        ];
        return view('data/barangjasa/view')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->ajax()) {
            $id_kategori = request()->id_kategori;
            $kat = KategoriModel::find($id_kategori);
            $data = [
                'id_kategori' => $id_kategori,
                'nm_kategori' => $kat->nm_kategori,
                'status_layanan' => $kat->status_layanan,
                'resultSatuan' => SatuanModel::all(),
            ];
            return view('data.barangjasa.formadd', $data);
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
            $id_kategori = $r->id_kategori;
            $kat = KategoriModel::find($id_kategori);
            if ($kat->status_layanan == 1) {
                $stok = 0;
                $validator = Validator::make($r->all(), [
                    'nm_brgjasa' => 'required|max:225',
                    'id_satuan' => 'required',
                    'harga_beli' => 'required',
                    'harga_jual' => 'required',
                    'diskon' => 'required',
                    'harga_jual_real' => 'required',
                    'ket_brgjasa' => 'required',
                    'status_tersedia' => 'required',

                ], [
                    'nm_brgjasa.required' => 'Nama ' . $kat->nm_kategori . ' Tidak Boleh Kosong',
                    'nm_brgjasa.max' => 'Nama ' . $kat->nm_kategori . ' Maksimal 225 Karakter',
                    'harga_beli.required' => 'Harga Beli Tidak Boleh Kosong',
                    'harga_jual.required' => 'Harga Jual Tidak Boleh Kosong',
                    'id_satuan.required' => 'Satuan Tidak Boleh Kosong',
                    'diskon.required' => 'Diskon Tidak Boleh Kosong',
                    'harga_jual_real.required' => 'Harga Real Tidak Boleh Kosong',
                    'ket_brgjasa.required' => 'Keterangan Tidak Boleh Kosong',
                    'status_tersedia.required' => 'Status Tidak Boleh Kosong',
                ]);
            } else {
                $stok = $r->stok;
                $validator = Validator::make($r->all(), [
                    'nm_brgjasa' => 'required|max:225',
                    'id_satuan' => 'required',
                    'stok' => 'required',
                    'harga_beli' => 'required',
                    'harga_jual' => 'required',
                    'diskon' => 'required',
                    'harga_jual_real' => 'required',
                    'ket_brgjasa' => 'required',
                    'status_tersedia' => 'required',

                ], [
                    'nm_brgjasa.required' => 'Nama ' . $kat->nm_kategori . ' Tidak Boleh Kosong',
                    'nm_brgjasa.max' => 'Nama ' . $kat->nm_kategori . ' Maksimal 225 Karakter',
                    'id_satuan.required' => 'Satuan Tidak Boleh Kosong',
                    'stok.required' => 'Stok Tidak Boleh Kosong',
                    'harga_beli.required' => 'Harga Beli Tidak Boleh Kosong',
                    'harga_jual.required' => 'Harga Jual Tidak Boleh Kosong',
                    'diskon.required' => 'Diskon Tidak Boleh Kosong',
                    'harga_jual_real.required' => 'Harga Real Tidak Boleh Kosong',
                    'ket_brgjasa.required' => 'Keterangan Tidak Boleh Kosong',
                    'status_tersedia.required' => 'Status Tidak Boleh Kosong',
                ]);
            }



            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = BarangJasaModel::create([
                    'nm_brgjasa'      => $r->nm_brgjasa,
                    'id_kategori'     => $r->id_kategori,
                    'id_satuan'       => $r->id_satuan,
                    'stok'            => $stok,
                    'harga_beli'      => str_replace(".", "", $r->harga_beli),
                    'harga_jual'      => str_replace(".", "", $r->harga_jual),
                    'diskon'          => str_replace(".", "", $r->diskon),
                    'harga_jual_real' => str_replace(".", "", $r->harga_jual_real),
                    'ket_brgjasa'     => $r->ket_brgjasa,
                    'status_tersedia' => $r->status_tersedia,
                ]);
                return response()->json(['success' => 'Data berhasil disimpan']);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangJasaModel  $barangJasaModel
     * @return \Illuminate\Http\Response
     */
    public function show(BarangJasaModel $barangJasaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangJasaModel  $barangJasaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangJasaModel $barangJasaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangJasaModel  $barangJasaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangJasaModel $barangJasaModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangJasaModel  $barangJasaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangJasaModel $barangJasaModel)
    {
        //
    }
}
