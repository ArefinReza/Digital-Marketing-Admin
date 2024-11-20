<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['name',
        'role',
        'email',
        'portfolio',
        'photo_url',
        'facebookLink',
        'linkedinLink',
        'phonenumber',
        'whatsapp',
        'education',
        'skills',
        'experience',
    ];
}
