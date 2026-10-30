<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    public $timestamps = false;

    protected $fillable = [
        'kode_kamar',
        'tipe',
        'panjang',
        'lebar',
        'harga_sewa',
        'status',
        'fasilitas',
        'keterangan',
    ];
}
