<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    // list kolom yang bisa diisi
    protected $fillable = ['nomor_pembelian', 'tanggal_pembelian', 'id_barang', 'harga', 'kuantitas', 'foto','deskripsi','harga'];

    // query nilai max dari kode pegawai untuk generate otomatis kode pegawai

    public function getNomorPembelian()
    {
        // query kode pegawai
        $sql = "SELECT IFNULL(MAX(nomor_pembelian), 'PB-000') as nomor_pembelian 
                FROM pembelian";
        $nomor_pembelian = DB::select($sql);

        // cacah hasilnya
        foreach ($nomor_pembelian as $np) {
            $ip = $np->nomor_pembelian;
        }
        // Mengambil substring tiga digit akhir dari string PG-000
        $noawal = substr($ip, -3);
        $noakhir = $noawal + 1; //menambahkan 1, hasilnya adalah integer cth 1

        //menyambung dengan string PR-001
        $noakhir = 'PB-' . str_pad($noakhir, 3, "0", STR_PAD_LEFT);

        return $noakhir;
    }
}
