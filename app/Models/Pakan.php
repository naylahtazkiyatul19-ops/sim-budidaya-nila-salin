<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    use HasFactory;

    protected $table = 'pakan'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'nama_pakan', 'stok', 'satuan', 'harga'
    ];

    public function pemberianPakans()
    {
        return $this->hasMany(PemberianPakan::class);
    }
}