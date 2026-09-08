<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembudidaya extends Model
{
    use HasFactory;

    protected $table = 'pembudidaya'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'nama', 'alamat', 'no_hp', 'nama_umkm', 'deskripsi', 'foto'
    ];

    public function kolams()
    {
        return $this->hasMany(Kolam::class);
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function promosis()
    {
        return $this->hasMany(Promosi::class);
    }
}