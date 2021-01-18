<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'position', 'institution', 'receipt', 'url', 'validated'
    ];

    protected $casts = [
        'validated' => 'boolean'
    ];
    
    public function post()
    {
       return $this->belongsTo(Post::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}
