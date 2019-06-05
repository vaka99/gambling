<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPrize extends Model
{
    protected $fillable = [
        'user_id', 
		'money',
		'bonus',
		'items'
    ];


}
