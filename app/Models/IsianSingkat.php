<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsianSingkat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'soal_id',
        'kunci'
    ];
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
