<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'kode_pegawai',
        'nama_pegawai',
        'jabatan',
        'nomor_telepon',
        'jenis_kelamin'
    ];

    public function getKodePegawai()
    {
        // query kode pegawai
        $sql = "SELECT IFNULL(MAX(kode_pegawai), 'PG-000') as kode_pegawai 
                FROM pegawai";
        $kodepegawai = DB::select($sql);

        // cacah hasilnya
        foreach ($kodepegawai as $kdpeg) {
            $kd = $kdpeg->kode_pegawai;
        }
        // Mengambil substring tiga digit akhir dari string PG-000
        $noawal = substr($kd,-3);
        $noakhir = $noawal+1; //menambahkan 1, hasilnya adalah integer cth 1
        
        //menyambung dengan string PG-001
        $noakhir = 'PG-'.str_pad($noakhir,3,"0",STR_PAD_LEFT); 

        return $noakhir;
    }
}