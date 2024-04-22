<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    // Ensure the table name matches exactly with what's in the database
    protected $table = 'penjualan';  // Make sure 'penjualan' is the correct table name

    // Fillable fields for mass assignment protection
    protected $fillable = [
        'pelanggan_id',
        'user_id',
        'tgl_penjualan',
        'total_harga'
    ];

    // Relationship method names should be in camelCase
    public function pelanggan() {
        // Ensure correct relationship (hasOne seems correct based on your naming)
        // If Pelanggan has many Penjualan, consider using belongsTo instead
        return $this->belongsTo(Pelanggan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailpenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
