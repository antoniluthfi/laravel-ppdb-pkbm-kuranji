<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'anak_ke',
        'jumlah_saudara',
        'pendidikan_terakhir',
        'sekolah_asal',
        'tahun_lulus',
        'tinggi_badan',
        'berat_badan',
        'nama_ayah',
        'tgl_lahir_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'tgl_lahir_ibu',
        'pekerjaan_ibu',
        'nomorhp',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function berkas()
    {
        return $this->hasOne(Berkas::class, 'user_id', 'id');
    }

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'user_id', 'id');
    }

    public function OauthAccessToken()
    {
        return $this->hasMany(OauthAccessToken::class);
    }
}
