<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    use HasFactory;
    protected $table ="admin";
    protected $guard = 'admin';
    protected $guarded = [];
    protected $hidden = [
        'password',
    ];
    public $timestamps = false;
}
