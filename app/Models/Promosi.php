<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;

    protected $table = 'promosi'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'panen_id', 'pembudidaya_id', 'judul', 'deskripsi', 'foto',
        'harga', 'stok', 'no_whatsapp', 'lokasi_tambak',
        'status', 'tanggal_mulai', 'tanggal_selesai'
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