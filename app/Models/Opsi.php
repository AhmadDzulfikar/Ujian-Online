<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'opsi',
        'ujian_id',
        'is_correct',
        'urutan',
    ];
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
