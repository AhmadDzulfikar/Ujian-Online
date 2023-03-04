<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'ujian_id',
        'token',
        'expired_date',
    ];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
