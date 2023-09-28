<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'kode_masuk',
        'tanggal_masuk',
        'total',
        'pemasok_id',
        'user_id',
    ];

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class);
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }
}
