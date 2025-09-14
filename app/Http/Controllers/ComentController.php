<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use App\Http\Requests\StoreComentsRequest;
use App\Http\Requests\UpdateComentsRequest;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function index()
    {
        $coment = Coment:: //with('users','category'->)
         included()
        ->filter()
        ->sort()
        ->getOrPaginate();
        return response()->json($coment);
        
    }

    public function store(Request $request)
    {
               $request->validate([
            'texto' => 'required|string|max:255',
            'valor_estrella' => 'required|integer|max:5',
            'user_id' => 'required|exists:users,id',
            'publication_id' => 'required|exists:publications,id' ]);

        $coment = Coment::create($request->all());
        return response()->json($coment, 201);
    }

   public function show($id)
    {
        $coment = Coment::with(['user','publication'])->findOrFail($id);
        return response()->json($coment);
    }

    public function update(Request $request, Coment $coment)
    {
          $request->validate([
            'texto' => 'required|string|max:255',
            'valor_estrella' => 'required|integer|max:5',
            'user_id' => 'required|exists:users,id',
            'publication_id' => 'required|exists:publications,id'        
        ]);

        $coment->update($request->all());
        return response()->json($coment);
        
    }

    public function destroy(Coment $coment)
    {
        $coment->delete();
        return response()->json(['message' => 'Deleted successfully']);
        
    }
}
