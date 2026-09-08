<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemberianPakan extends Model
{
    use HasFactory;

    protected $table = 'pemberian_pakan'; // <-- TAMBAHKAN INI

    protected $fillable = [
        'kolam_id', 'pakan_id', 'tanggal', 'jumlah', 'keterangan'
    ];

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }

    public function pakan()
    {
        return $this->belongsTo(Pakan::class);
    }
}