<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Http\Requests\StorePublicationsRequest;
use App\Http\Requests\UpdatePublicationsRequest;
use Illuminate\Http\Request;


class PublicationController extends Controller
{
     public function index()
    {
        $publication = Publication:: //with('users','category'->)
         included()
        ->filter()
        ->sort()
        ->getOrPaginate();
        return response()->json($publication);
        
    }

    public function store(Request $request)
    {
               $request->validate([
            'titulo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'visibilidad' => 'required|integer|max:5',
            'seller_id' => 'required|exists:sellers,id',
            'category_id' => 'required|exists:categories,id'
         ]);

        $publication = Publication::create($request->all());
        return response()->json($publication, 201);
    }

   public function show($id)
    {
        $publication = Publication::with(['users','seller','category','coments','complaints','images'])->findOrFail($id);
        return response()->json($publication);
    }

    public function update(Request $request, Publication $publication)
    {
          $request->validate([
           'titulo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'visibilidad' => 'required|integer|max:5',
            'seller_id' => 'required|exists:sellers,id',
            'category_id' => 'required|exists:categories,id'     
        ]);

        $publication->update($request->all());
        return response()->json($publication);
        
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return response()->json(['message' => 'Deleted successfully']);
        
    }
}
