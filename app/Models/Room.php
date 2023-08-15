<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'type_house',
        'description',
        'prix',
        'status',
        'is_featured',
    ];
}
