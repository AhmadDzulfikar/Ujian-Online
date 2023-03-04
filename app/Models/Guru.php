<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'fullname',
        'username',
        'password',
    ];

    public function mapels()
    {
        return $this->hasMany(Mapel::class);
    }
}
