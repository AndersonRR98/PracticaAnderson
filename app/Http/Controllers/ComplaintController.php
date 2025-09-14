<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Http\Requests\StoreComplaintsRequest;
use App\Http\Requests\UpdateComplaintsRequest;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    
    public function index()
    {
        $complaint = Complaint:: //with('users','category'->)
         included()
        ->filter()
        ->sort()
        ->getOrPaginate();
        return response()->json($complaint);
        
    }

    public function store(Request $request)
    {
               $request->validate([
            'estado' => 'required|integer|max:255',
            'descripcion_adicional' => 'required|string|max:255',
           'reason_id' => 'required|integer|max:5',
            'user_id' => 'required|exists:users,id',
            'publication_id' => 'required|exists:publications,id'
         ]);

        $complaint = Complaint::create($request->all());
        return response()->json($complaint, 201);
    }

   public function show($id)
    {
        $complaint = Complaint::with(['user','publication'])->findOrFail($id);
        return response()->json($complaint);
    }

    public function update(Request $request, Complaint $complaint)
    {
          $request->validate([
            'estado' => 'required|integer|max:255',
            'descripcion_adicional' => 'required|string|max:255',
           'reason_id' => 'required|integer|max:5',
            'user_id' => 'required|exists:users,id',
            'publication_id' => 'required|exists:publications,id'        
        ]);

        $complaint->update($request->all());
        return response()->json($complaint);
        
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return response()->json(['message' => 'Deleted successfully']);
        
    }
}
