<?php

namespace App\Models;
use App\Models\Perusahaansign;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'image1', 'image2', 'namabeasiswa', 'namaperusahaan', 'batasbeasiswa', 'minipersyaratan', 'miniisi', 'persyaratan', 'isipersyaratan', 'judul_benefit', 'bidang_benefit', 'isi_benefit', 'is_published', 'company_id'
    ];

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'beasiswa_user', 'beasiswa_id', 'user_id');
    }
    
    public function perusahaan()
{
    return $this->belongsTo(Perusahaansign::class, 'company_id', 'id');
}
}


