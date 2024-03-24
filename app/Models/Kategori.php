<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'deskripsi_kategori'
    ];

    // query nilai max dari kode perusahaan untuk generate otomatis kode perusahaan
    public function getKodeKategori()
    {
        // query kode perusahaan
        $sql = "SELECT IFNULL(MAX(kode_kategori), 'KTG-000') as kode_kategori 
                FROM kategori";
        $kodekategori = DB::select($sql);

        // cacah hasilnya
        foreach ($kodekategori as $kdktg) {
            $kd = $kdktg->kode_kategori;
        }
        // Mengambil substring tiga digit akhir dari string PR-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string PR-001
        $noakhir = 'KTG-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;

    }
}
