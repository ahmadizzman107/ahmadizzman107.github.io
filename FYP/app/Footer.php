<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'address', 'tel_no', 'fax_no', 'email', 
        'twitter', 'facebook', 'instagram', 'linkedin',
    ];
}
