<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'kode_menu',
        'nama_menu',
        'deskripsi',
        'harga',
        'kategori'
    ];

    public static function getKodeMenu()
    {
        // query kode perusahaan
        $sql = "SELECT IFNULL(MAX(kode_menu), 'MN-000') as kode_menu
                FROM menu";
        $kodemenu = DB::select($sql);

        // cacah hasilnya
        foreach ($kodemenu as $kdmn) {
            $kd = $kdmn->kode_menu;
        }
        // Mengambil substring tiga digit akhir dari string PR-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string PR-001
        $noakhir = 'MN-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;
    }
}
