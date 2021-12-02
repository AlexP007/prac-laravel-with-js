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
        // $apartment = Apartment::find($id);

        $image = Image::create([
            'apartment_id' => $id,
            'url' => $path,
        ]);
        // сохранить картинку в storage
        // положить url в БД save($request->all())
        

        $data = [
            'data' => [
                'url' => $image->url($path),
            ],
        ];
        
        return $data;

    }
}
