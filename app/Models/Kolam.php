<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolam extends Model
{
    use HasFactory;

    protected $table = 'kolam'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'pembudidaya_id', 'nama_kolam', 'luas', 'lokasi', 'status'
    ];

    public function pembudidaya()
    {
        return $this->belongsTo(Pembudidaya::class);
    }

    public function benihs()
    {
        return $this->hasMany(Benih::class);
    }

    public function pemberianPakans()
    {
        return $this->hasMany(PemberianPakan::class);
    }

    public function panens()
    {
        return $this->hasMany(Panen::class);
    }
}