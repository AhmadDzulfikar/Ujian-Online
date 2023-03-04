<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Proktor extends Authenticatable
{
    use HasFactory;

    protected $guard = 'proktor';
    protected $fillable = [
        'email',
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
}
