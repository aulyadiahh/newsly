<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

     // mendefinisikan relasi di dalam model (funtion relasi) //
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
