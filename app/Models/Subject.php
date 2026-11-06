<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Tambahkan baris ini 
    protected $fillable = [
        'name',
        'description',
        'grade',
        'watch_hours',
    ];
}
