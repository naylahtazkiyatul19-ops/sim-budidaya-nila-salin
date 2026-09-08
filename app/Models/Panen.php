<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    use HasFactory;

    protected $table = 'panen'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'kolam_id', 'tanggal_panen', 'berat_panen', 'harga_per_kg', 'status', 'keterangan'
    ];

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function promosi()
    {
        return $this->hasOne(Promosi::class);
    }
}