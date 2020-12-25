<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'cerita_id',
        'email',
        'comment',
    ];

    public function cerita()
    {
        return $this->belongsTo('App\Cerita');
    }

}
