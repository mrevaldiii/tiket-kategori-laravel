<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiTiket extends Model
{
    protected $fillable = ['tipe_tiket', 'harga', 'kuota_tersedia', 'nama_lengkap'];
}
