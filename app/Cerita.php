<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerita extends Model
{
    protected $fillable = [
        'judul',
        'cerita',
        'user_id',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
