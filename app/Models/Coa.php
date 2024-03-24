<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Coa extends Model
{
     // use HasFactory;
     protected $table = 'coa';
     protected $primaryKey = 'id_akun';

     // untuk melist kolom yang dapat diisi
     protected $fillable = [
         'id_coa',
         'kode_akun',
         'nama_akun',
         'header_akun',
     ];
 
}
