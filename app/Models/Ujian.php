<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'mapel_id',
        'waktu_mulai',
        'alokasi_waktu',
        'tanggal'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function tokens()
    {
        return $this->hasOne(Token::class);
    }
    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
    public function opsi()
    {
        return $this->hasMany(Opsi::class);
    }
}
