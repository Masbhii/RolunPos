<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'nomor_telepon_pelanggan',
        'jenis_kelamin_pelanggan',
    ];

    public static function getKodePelanggan()
    {
        // query kode pelanggan
        $sql = "SELECT IFNULL(MAX(kode_pelanggan), 'PLGN-000') as kode_pelanggan
                FROM pelanggan";
        $kodepelanggan = DB::select($sql);

        // cacah hasilnya
        foreach ($kodepelanggan as $kdplgn) {
            $kd = $kdplgn->kode_pelanggan;
        }
        // Mengambil substring tiga digit akhir dari string PR-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string PR-001
        $noakhir = 'PLGN-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;
    }
}
