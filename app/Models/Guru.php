<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'fullname',
        'username',
        'password',
    ];

    protected $hidden = [
        'password'
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function mapels()
    {
        return $this->hasMany(Mapel::class);
    }
}
