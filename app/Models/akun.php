<?php

namespace App\Models;

use App\Models\Fav;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class akun extends Model
{
    use HasFactory;
    protected $table ="user";
    protected $guarded=['id'];
    protected $hidden = [
        'password',
    ];

    public function review(){
        return $this->hasMany(Review::class, 'user_id','id');
    }
    public function fav(){
        return $this->hasMany(Fav::class, 'user_id','id');
    }
}
