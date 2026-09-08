<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pembudidaya;
use App\Models\Kolam;
use App\Models\Benih;
use App\Models\Pakan;
use App\Models\PemberianPakan;
use App\Models\Panen;
use App\Models\Penjualan;
use App\Models\Promosi;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        $user = User::create([
            'name' => 'Admin Desa Wanantara',
            'email' => 'admin@wanantara.com',
            'password' => Hash::make('password123'),
        ]);

        // Create Pembudidaya
        $pembudidaya1 = Pembudidaya::create([
            'nama' => 'Bapak Suparman',
            'alamat' => 'Dusun Wanantara RT 02 RW 01',
            'no_hp' => '081234567890',
            'nama_umkm' => 'UMKM Mina Lestari',
            'deskripsi' => 'Budidaya ikan nila salin sejak 2020 dengan luas tambak 2 hektare',
            'foto' => null,
        ]);

        $pembudidaya2 = Pembudidaya::create([
            'nama' => 'Ibu Siti Rahayu',
            'alamat' => 'Dusun Wanantara RT 05 RW 02',
            'no_hp' => '081298765432',
            'nama_umkm' => 'UMKM Nila Sejahtera',
            'deskripsi' => 'Budidaya ikan nila salin organik dengan sistem bioflok',
            'foto' => null,
        ]);

        // Create Kolam
        $kolam1 = Kolam::create([
            'pembudidaya_id' => $pembudidaya1->id,
            'nama_kolam' => 'Kolam A-1',
            'luas' => 2000,
            'lokasi' => 'Blok Sawah Wanantara',
            'status' => 'aktif',
        ]);

        $kolam2 = Kolam::create([
            'pembudidaya_id' => $pembudidaya1->id,
            'nama_kolam' => 'Kolam A-2',
            'luas' => 1500,
            'lokasi' => 'Blok Sawah Wanantara',
            'status' => 'aktif',
        ]);

        $kolam3 = Kolam::create([
            'pembudidaya_id' => $pembudidaya2->id,
            'nama_kolam' => 'Kolam B-1',
            'luas' => 1000,
            'lokasi' => 'Blok Tambak Wanantara',
            'status' => 'aktif',
        ]);

        // Create Benih
        Benih::create([
            'kolam_id' => $kolam1->id,
            'jumlah_benih' => 5000,
            'tanggal_tebar' => '2026-06-01',
            'sumber_benih' => 'Balai Benih Indramayu',
            'keterangan' => 'Benih nila salin ukuran 5-7 cm',
        ]);

        Benih::create([
            'kolam_id' => $kolam2->id,
            'jumlah_benih' => 3000,
            'tanggal_tebar' => '2026-06-15',
            'sumber_benih' => 'Balai Benih Indramayu',
            'keterangan' => 'Benih nila salin ukuran 3-5 cm',
        ]);

        // Create Pakan
        $pakan1 = Pakan::create([
            'nama_pakan' => 'Pakan Pelet 781-2',
            'stok' => 500,
            'satuan' => 'kg',
            'harga' => 12000,
        ]);

        $pakan2 = Pakan::create([
            'nama_pakan' => 'Pakan Pelet 781-1',
            'stok' => 300,
            'satuan' => 'kg',
            'harga' => 15000,
        ]);

        // Create Pemberian Pakan
        PemberianPakan::create([
            'kolam_id' => $kolam1->id,
            'pakan_id' => $pakan1->id,
            'tanggal' => '2026-07-01',
            'jumlah' => 50,
            'keterangan' => 'Pemberian pagi hari',
        ]);

        PemberianPakan::create([
            'kolam_id' => $kolam1->id,
            'pakan_id' => $pakan1->id,
            'tanggal' => '2026-07-02',
            'jumlah' => 45,
            'keterangan' => 'Pemberian sore hari',
        ]);

        // Create Panen
        $panen1 = Panen::create([
            'kolam_id' => $kolam1->id,
            'tanggal_panen' => '2026-08-01',
            'berat_panen' => 1200,
            'harga_per_kg' => 35000,
            'status' => 'tersedia',
            'keterangan' => 'Panen perdana nila salin',
        ]);

        $panen2 = Panen::create([
            'kolam_id' => $kolam2->id,
            'tanggal_panen' => '2026-08-15',
            'berat_panen' => 800,
            'harga_per_kg' => 33000,
            'status' => 'tersedia',
            'keterangan' => 'Panen kedua',
        ]);

        // Create Penjualan
        Penjualan::create([
            'panen_id' => $panen1->id,
            'pembudidaya_id' => $pembudidaya1->id,
            'tanggal_penjualan' => '2026-08-05',
            'jumlah_kg' => 200,
            'harga_per_kg' => 35000,
            'total_harga' => 7000000,
            'pembeli' => 'Restoran Mina Indramayu',
            'no_hp_pembeli' => '082345678901',
            'metode_penjualan' => 'pembeli_datang',
            'keterangan' => 'Pembelian untuk restoran',
        ]);

        // Create Promosi
        Promosi::create([
            'panen_id' => $panen1->id,
            'pembudidaya_id' => $pembudidaya1->id,
            'judul' => 'Ikan Nila Salin Segar - Panen Perdana',
            'deskripsi' => 'Ikan nila salin berkualitas tinggi, hasil panen perdana.',
            'foto' => null,
            'harga' => 35000,
            'stok' => 1000,
            'no_whatsapp' => '081234567890',
            'lokasi_tambak' => 'Blok Sawah Wanantara, Kec. Sindang, Indramayu',
            'status' => 'aktif',
            'tanggal_mulai' => '2026-08-01',
            'tanggal_selesai' => '2026-09-01',
        ]);

        Promosi::create([
            'panen_id' => $panen2->id,
            'pembudidaya_id' => $pembudidaya2->id,
            'judul' => 'Nila Salin Organik - Bioflok',
            'deskripsi' => 'Ikan nila salin hasil budidaya organik dengan sistem bioflok.',
            'foto' => null,
            'harga' => 33000,
            'stok' => 750,
            'no_whatsapp' => '081298765432',
            'lokasi_tambak' => 'Blok Tambak Wanantara, Kec. Sindang, Indramayu',
            'status' => 'aktif',
            'tanggal_mulai' => '2026-08-15',
            'tanggal_selesai' => '2026-09-15',
        ]);
    }
}