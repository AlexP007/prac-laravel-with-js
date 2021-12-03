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
    }

    public function getUrlAttribute($url)
    {
        return sprintf('http://prac.local/storage/%s', $url);
    }


}
