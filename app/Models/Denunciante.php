<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denunciante extends Model
{
    use HasFactory;

    protected $table = 'denunciante';

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'dni',
        'direccion',
        'distrito',
        'provincia',
        'celular',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

