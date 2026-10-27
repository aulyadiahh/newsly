<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable =[
        'user_id',
        'username',
        'avatar',
        'bio'
    ];

     // mendefinisikan relasi di dalam model (funtion relasi) //

     public function user()
     {
         return $this->belongsTo(User::class);
     }
     
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
