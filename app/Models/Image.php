<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'url',
    ];

    public function url($path)
    {
        return sprintf('http://prac.local/storage/%s', $path);
        // артисан положил в паблик сторадж
    }

    public function getUrlAttribute($url)
    {
        // dd($url);
        return sprintf('http://prac.local/storage/%s', $url);
    }


}
