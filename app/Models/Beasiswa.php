<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'image1', 'image2', 'namabeasiswa', 'namaperusahaan', 'batasbeasiswa', 'minipersyaratan', 'miniisi', 'persyaratan', 'isipersyaratan', 'image3', 'judul_benefit', 'isi_benefit'
    ];
}
