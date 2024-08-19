<?php

namespace App\Models;

use App\Models\Fav;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    use HasFactory;
    protected $table ="mytable";
    protected $guarded=['id'];

    public function review(){
        return $this->hasMany(Review::class, 'movie_id','id');
    }
    public function fav(){
        return $this->hasMany(Fav::class, 'movie_id','id');
    }
    public function like(){

        return $this->hasManyThrough(Like::class, Review::class, 'movie_id', 'review_id', 'l_id', 'review_id');

    }
}
