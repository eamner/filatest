<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    //protected $primaryKey = 'cityId';
    protected $fillable = [
        'city_name',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'city_id');
    }
}
