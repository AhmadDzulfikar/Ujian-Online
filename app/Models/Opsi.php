<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'opsi',
        'soal_id',
        'is_correct',
        'urutan',
    ];
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
