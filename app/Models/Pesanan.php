<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Supaya Laravel tahu kalau nama tabel di PHPMyAdmin kamu adalah 'pesanan' (tanpa 's')
    protected $table = 'pesanan';

    // Daftarkan kolom yang boleh diisi datanya
    protected $fillable = [
        'nomor_nota',
        'nama_pelangan',
        'nomor_hp',
        'layanan_id',
        'jumlah',
        'total_harga',
        'status'
    ];

    // Hubungan relasi ke model Layanan (Mengambil data tarif/nama layanan)
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
}