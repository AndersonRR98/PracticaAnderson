<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Http\Requests\StoreSellersRequest;
use App\Http\Requests\UpdateSellersRequest;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $seller = Seller:: //with('users','category'->)
         included()
        ->filter()
        ->sort()
        ->getOrPaginate();
        return response()->json($seller);
        
    }

    public function store(Request $request)
    {
               $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:200',
            'user_id' => 'required|exists:users,id',
         ]);

        $seller = Seller::create($request->all());
        return response()->json($seller, 201);
    }

   public function show(Seller $seller)
    {
        return response()->json($seller);
    }

    public function update(Request $request, Seller $seller)
    {
          $request->validate([
           'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:200',
            'user_id' => 'required|exists:users,id',     
        ]);

        $seller->update($request->all());
        return response()->json($seller);
        
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();
        return response()->json(['message' => 'Deleted successfully']);
        
    }
}
