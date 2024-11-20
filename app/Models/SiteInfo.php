<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;
    protected $table = 'site_info';

    protected $fillable = [
        'sitename',
        'email',
        'phone_number',
        'about',
        'refund',
        'parchase_guide',
        'privacy',
        'address',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'copyright_text',
    ];
}
