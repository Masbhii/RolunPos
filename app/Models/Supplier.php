<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_supplier',
        'nama_perusahaan',
        'alamat',
        'nomor_telepon',
        'kategori_produk',
    ];

    public static function getKodeSupplier()
    {
        // query kode supplier
        $sql = "SELECT IFNULL(MAX(kode_supplier), 'SP-000') as kode_supplier
                FROM supplier";
        $kodesupplier = DB::select($sql);

        // cacah hasilnya
        foreach ($kodesupplier as $kdsp) {
            $kd = $kdsp->kode_supplier;
        }
        // Mengambil substring tiga digit akhir dari string SP-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string SP-001
        $noakhir = 'SP-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;
    }
}
