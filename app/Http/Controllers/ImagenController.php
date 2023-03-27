<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');

        $nameImage = Str::uuid().".".$image->extension();

        $imageServidor = Image::make($image);
        $imageServidor->fit(1000,1000);

        $imagePath = public_path('uploads').'/'.$nameImage;
        $imageServidor->save($imagePath);
        
        return response()->json(['image' => $nameImage]);
    }
}
