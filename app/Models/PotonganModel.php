<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganModel extends Model
{
    use HasFactory;
    public $table = "cpar_004_akun_potongan";
    protected $primarykey = "id_pot";
    protected $fillable = ['nm_pot', 'ket_pot'];
}
