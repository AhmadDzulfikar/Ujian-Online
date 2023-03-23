<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';
    protected $fillable = [
        'email',
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
