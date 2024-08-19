<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;
    protected $table ="like";
    protected $guarded=['l_id'];

    public function review(){
        return $this->belongsTo(Review::class, 'review_id','review_id');
    }
    public function akun(){
        return $this->belongsTo(akun::class, 'user_id','id');
    }
}
