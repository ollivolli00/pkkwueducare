<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
      
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'perusahaan_id' // Pastikan ini ada jika Anda menggunakan relasi
    ];
  
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "perusahaan"][$value],
        );
    }

    /**
     * Mendapatkan perusahaan yang dimiliki oleh user.
     */
    public function perusahaan()
    {
        return $this->hasOne(PerusahaanSign::class, 'user_id', 'id');
    }
    
    public function beasiswas()
    {
        return $this->belongsToMany(Beasiswa::class, 'beasiswa_user', 'user_id', 'beasiswa_id');
    }
}