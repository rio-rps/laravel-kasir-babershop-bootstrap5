<?php

namespace App\Http\Controllers;

use App\Models\BarangJasaModel;
use App\Models\KategoriModel;
use App\Models\SatuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HargaController extends Controller
{
    public function formedit(Request $r)
    {
        if (request()->ajax()) {
            $id_brgjasa =  $r->id_brgjasa;
            $dt =  DB::table('cpar_003_barangjasa')
                ->where('cpar_003_barangjasa.id_brgjasa', '=', $id_brgjasa)
                ->select('*')
                ->first();


            $data = [
                'id_brgjasa'  => $id_brgjasa,
                'row' => $dt,
            ];
            return view('data.harga.formedit', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function update(Request $r, $id)
    {
        if (request()->ajax()) {

            $validator = Validator::make($r->all(), [
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'diskon' => 'required',
                'harga_jual_real' => 'required',

            ], [
                'harga_beli.required' => 'Harga Beli Tidak Boleh Kosong',
                'harga_jual.required' => 'Harga Jual Tidak Boleh Kosong',
                'diskon.required' => 'Diskon Tidak Boleh Kosong',
                'harga_jual_real.required' => 'Harga Real Tidak Boleh Kosong',
            ]);



            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                BarangJasaModel::where('id_brgjasa', $id)->update([
                    'harga_beli'      => str_replace(".", "", $r->harga_beli),
                    'harga_jual'      => str_replace(".", "", $r->harga_jual),
                    'diskon'          => str_replace(".", "", $r->diskon),
                    'harga_jual_real' => str_replace(".", "", $r->harga_jual_real),
                ]);
                return response()->json(['success' => 'Data berhasil diupdate']);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
