<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',          
        'namalengkap', 
        'tanggal_lahir', 
        'jenis_kelamin', 
        'email', 
        'no_telp', 
        'image',
        'profile_complete'
    ];

    /**
     * Relasi ke model User.
     * Menunjukkan bahwa profil ini dimiliki oleh satu user.
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user'); // Hubungkan ke model User dengan foreign key id_user
    // }
    public function daftars()
    {
        return $this->hasMany(Daftar::class, 'user_id', 'id_user'); // Menghubungkan ke model Daftar
    }
public function pengguna()
{
    return $this->belongsTo(Pengguna::class, 'user_id'); // Pastikan 'user_id' adalah kolom yang sesuai
}

// Properti yang harus di-cast
protected $casts = [
    'profile_complete' => 'boolean', // Akan otomatis menjadi true/false
];
}
