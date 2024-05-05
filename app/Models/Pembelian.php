<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_pembelian',
        'no_pembelian',
        'keterangan',
        'status',
        'tgl_jatuh_tempo',
        'kuantitas',
        'harga',
        'id_barang',
        'id_pegawai',
        'id_supplier'
    ];

    public static function getKodePembelian()
    {
        // query kode barang
        $sql = "SELECT IFNULL(MAX(no_pembelian), 'PB-000') as no_pembelian
                FROM pembelian";
        $kodepembelian = DB::select($sql);

        // cacah hasilnya
        foreach ($kodepembelian as $kdpem) {
            $kd = $kdpem->no_pembelian;
        }
        // Mengambil substring tiga digit akhir dari string SP-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string SP-001
        $noakhir = 'PEM-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;
    }
}
