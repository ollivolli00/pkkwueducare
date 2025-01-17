<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $table = 'daftars'; // Pastikan nama tabel sesuai

    // Daftar kolom yang dapat diisi
    protected $fillable = [
        'user_id', 'beasiswa_id', 'zip_file', 'namalengkap', 'tanggal_lahir', 'jenis_kelamin', 'email', 'no_telp', 'image', 'status',
    ];

    /**
     * Relasi dengan model User (Pengguna)
     * Setiap pendaftaran terkait dengan satu pengguna.
     */

// Model Daftar

public function pengguna()
{
    return $this->belongsTo(Pengguna::class, 'user_id', 'id_user'); // Menghubungkan ke model Pengguna
}


// Di model Daftar
public function beasiswa()
{
    return $this->belongsTo(Beasiswa::class, 'beasiswa_id');  // Pastikan kolom 'beasiswa_id' ada di tabel Daftar
}

    
}
