<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detailpenjualan';
    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'jumlah_produk',
        'subtotal'
    ];

    public function Penjualan(){
        return $this->belongsTo(Penjualan::class);
    }

    public function Produk(){
        return $this->belongsTo(Produk::class);
    }
}
