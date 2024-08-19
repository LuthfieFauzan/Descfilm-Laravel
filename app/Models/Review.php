<?php

namespace App\Models;

use App\Models\Film;
use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $table ="review";
    protected $guarded=['review_id'];

    public function film(){
        return $this->belongsTo(Film::class, 'movie_id','id');
    }
    public function akun(){
        return $this->belongsTo(akun::class, 'user_id','id');
    }
    public function like(){
        return $this->hasMany(Like::class, 'review_id','review_id');
    }
}
