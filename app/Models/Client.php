<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'primary_legal_counsel', 
        'dob', 
        'case_details',
        'profile_image'
    ];

}
