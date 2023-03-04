<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'soal_id',
        'siswa_id',
        'jawaban',
    ];
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
