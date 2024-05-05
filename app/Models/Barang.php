<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'satuan',
    ];

    public static function getKodeBarang()
    {
        // query kode barang
        $sql = "SELECT IFNULL(MAX(kode_barang), 'BRG-000') as kode_barang
                FROM barang";
        $kodebarang = DB::select($sql);

        // cacah hasilnya
        foreach ($kodebarang as $kdbr) {
            $kd = $kdbr->kode_barang;
        }
        // Mengambil substring tiga digit akhir dari string SP-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string SP-001
        $noakhir = 'BRG-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;
    }
}
