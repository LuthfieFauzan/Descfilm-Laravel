<?php

namespace App\Models;

use App\Models\akun;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fav extends Model
{
    use HasFactory;
    protected $table ="favourite";
    protected $guarded=['fav_id'];

    public function film(){
        return $this->belongsTo(Film::class, 'movie_id','id');
    }
    public function akun(){
        return $this->belongsTo(akun::class, 'user_id','user_id');
    }
}
