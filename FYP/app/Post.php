<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body','image','url',
        'date', 'time_start', 'time_end', 
        'location', 'fees'
    ];
    public function user()
    {
        $this->belongsTo('App/User');
    }

    public function participant()
    {
        $this->hasMany('App/Paticipant');
    }
}
