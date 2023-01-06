<?php

function format_rupiah($angka)
{
    $hasil = number_format($angka, 0, ".", ".");
    return $hasil;
}

function status_brgjasa($angka)
{
    if ($angka == 1) {
        $isi = "Ada Tersedia";
    } elseif ($angka == 2) {
        $isi = "Tidak Tersedia";
    }
    return $isi;
}
