<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title_services',
        'title_tile_1','desc_tile_1',
        'title_tile_2','desc_tile_2',
        'title_tile_3','desc_tile_3',
        'title_tile_4','desc_tile_4',
        'title_tile_5','desc_tile_5',
        'title_tile_6','desc_tile_6'
    ];
}
