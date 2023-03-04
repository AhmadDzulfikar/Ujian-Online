<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ujian_id',
        'text',
        'tipe',
        'poin',
    ];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
    public function jawaban_siswas()
    {
        return $this->hasOne(JawabanSiswa::class);
    }
    public function isian_singkats()
    {
        return $this->hasOne(IsianSingkat::class);
    }
}
