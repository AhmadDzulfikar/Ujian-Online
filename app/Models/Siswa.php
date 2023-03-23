<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'fullname',
        'username',
        'password',
        'kelas_id'
    ];

    protected $hidden = [
        'password'
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function jawaban_siswas()
    {
        return $this->hasMany(JawabanSiswa::class);
    }
}
