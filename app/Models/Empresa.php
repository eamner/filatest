<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'rif',
        'name',
        'phone',
        'website',
        'address',
        'linkedin_profile',
        'twitter_profile',
        'instagram_profile',
        'facebook_profile',
        'youtube_profile',

    ];
}
