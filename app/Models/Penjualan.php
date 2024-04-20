<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table =' penjualans';
    protected $fillable =[
        'pelanggan_id',
        'tgl_penjualan',
        'total_harga'
    ];

    public function Pelanggan(){
        return $this->hasOne(Pelanggan::class, 'id', 'pelanggan_id');
    }

}
