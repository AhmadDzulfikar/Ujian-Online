<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proktor extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'fullname',
        'username',
        'password',
    ];
}
