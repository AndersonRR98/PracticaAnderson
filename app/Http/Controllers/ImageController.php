<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImagesRequest;
use App\Http\Requests\UpdateImagesRequest;
use Illuminate\Http\Request;

class ImageController extends Controller
{
     public function index()
    {
         $image = Image:: //with('commentable')
        included()   // incluye relaciones dinámicamente (?include=commentable)
        ->filter()     // filtra por campos (?filter[contenido]=texto)
        ->sort()       // ordena (?sort=-created_at)
        ->getOrPaginate(); // devuelve paginado si pasas ?page[size]=10&page[number]=1

         return response()->json($image); 
        
        }

    public function store(Request $request)
    {
        $request->validate([
            'url_image' => 'required|url',
           'imageable_type' => 'required|string',
            'imageable_id' => 'required|integer',
        ]);

        $image = Image::create([
            'url_image' => $request->url_image,
            'imageable_type' => $request->imageable_type,
            'imageable_id' => $request->imageable_id,
        ]);

        return response()->json($image, 201);
    }

   public function show($id)
    {
        $image = Image::with(['imageable'])->findOrFail($id);
        return response()->json($image);
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'url_image' => 'required|url',
        ]);

        $image->update($request->only('url_image'));
        return response()->json($image);
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
