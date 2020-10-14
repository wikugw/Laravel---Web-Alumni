<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id',
        'angkatan',
        'jurusan',
        'alamat',
        'no_hp',
        'foto',
        'facebook',
        'instagram',
        'twitter'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
