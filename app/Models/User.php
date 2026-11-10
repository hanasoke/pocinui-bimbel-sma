<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'birthdate',
        'birthdate_location',
        'role',
        'photo',
        'school_grade',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array 
    {
        return [
            'birthdate' => 'date',
            'password' => 'hashed',
        ];
    }
}