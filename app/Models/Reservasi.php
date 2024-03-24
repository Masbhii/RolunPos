<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'nomor_telp',
        'tanggal_reservasi',
        'noomor_meja',
        'kapasitas_meja',
        'lantai'
    ];

    protected $dates = [
        'tanggal_reservasi'
    ];



    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}