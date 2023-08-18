<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'mat_client',
        'email',
        'sexe',
        'gender',
        'date_naiss',
        'lieu_naiss',
        'numb_identite',
        'numb_passport',
        'name_father',
        'name_mother',
        'company',
        'numb_card_bank',
        'type_carb_bank',
        'adresse',
        'city',
        'phone',
        'status',
        'email',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];
}
