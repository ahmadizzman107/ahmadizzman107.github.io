<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title_about', 'desc_about',
        'title_mission', 'desc_mission',
        'title_people', 'desc_people',
        'title_vision', 'desc_vision' 
    ];
}
