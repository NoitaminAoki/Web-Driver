<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'code_admin', 'profile_img', 'level', 'sub_level','email','password',
    ];

    protected $hidden = [
      'password',
    ];
}
