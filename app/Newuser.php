<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newuser extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'address',
    ];
}
