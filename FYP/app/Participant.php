<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'position', 'institution', 'receipt', 'url'
    ];

    public function post()
    {
        $this->belongsTo('App/Post');
    }
}
