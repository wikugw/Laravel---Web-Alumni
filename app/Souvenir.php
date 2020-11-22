<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    protected $fillable = [
        'user_id',
        'service',
        'ongkos_kirim'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
