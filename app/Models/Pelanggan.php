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

    public function getKodePelanggan()
    {
        $lastPelanggan = Pelanggan::orderBy('id_pelanggan', 'desc')->first();
        if ($lastPelanggan) {
            $lastId = $lastPelanggan->id_pelanggan;
            $newId = $lastId + 1;
        } else {
            $newId = 1;
        }

        $kodePelanggan = 'PLG' . sprintf('%04s', $newId);
        return $kodePelanggan;
    }
}