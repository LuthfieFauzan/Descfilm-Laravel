<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table ="feedback";
    protected $guarded=['feed_id'];

    public function akun(){
        return $this->belongsTo(akun::class, 'user_id','id');
    }
}
