<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'panen_id', 'pembudidaya_id', 'tanggal_penjualan', 'jumlah_kg',
        'harga_per_kg', 'total_harga', 'pembeli', 'no_hp_pembeli',
        'metode_penjualan', 'keterangan'
    ];

    public function panen()
    {
        return $this->belongsTo(Panen::class);
    }

    public function pembudidaya()
    {
        return $this->belongsTo(Pembudidaya::class);
    }
}