<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    //protected $primaryKey = 'empresaId';

    protected $fillable = [
        'rif',
        'name',
        'ano_fund',
        'phone',
        'website',
        'street',
        'city_id',
        /*'state_id',
        'country_id',*/
        'linkedin_profile',
        'twitter_profile',
        'instagram_profile',
        'facebook_profile',
        'youtube_profile',

    ];

    protected $hidden = [
        //---
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
