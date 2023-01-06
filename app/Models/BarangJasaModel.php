<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangJasaModel extends Model
{
    use HasFactory;
    public $table = "cpar_003_barangjasa";
    protected $primarykey = "id_brgjasa";
    protected $fillable = ['nm_brgjasa', 'id_kategori', 'id_satuan', 'stok', 'harga_beli', 'harga_jual', 'diskon', 'harga_jual_real', 'ket_brgjasa', 'status_tersedia'];
}
