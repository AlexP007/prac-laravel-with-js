<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Image;


class ImagesController extends Controller
{
    public function images(Request $request, $id)
    {

        $path = $request->file('image')->store('images', 'public');

        $image = Image::create([
            'apartment_id' => $id,
            'url' => $path,
        ]);    

        $data = [
            'data' => [
                'url' => $image->url($path),
            ],
        ];
        
        return $data;

    }
}
