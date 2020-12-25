<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'adrress',
        'city_id',
        'province_id',
        'postal_code'
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
