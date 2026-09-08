<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benih extends Model
{
    use HasFactory;

    protected $table = 'benih'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'kolam_id', 'jumlah_benih', 'tanggal_tebar', 'sumber_benih', 'keterangan'
    ];

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }
}