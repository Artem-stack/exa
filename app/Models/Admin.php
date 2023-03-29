<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User;

class Admin extends \Illuminate\Foundation\Auth\User

{
	protected $table = 'admin_users';
    use HasFactory;

     protected $fillable = [
        'email',
        'password',
    ];
}
