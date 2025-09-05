<?php

namespace App\Http\Controllers;

use App\Models\Coments;
use App\Http\Requests\StoreComentsRequest;
use App\Http\Requests\UpdateComentsRequest;

class ComentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Coments $coments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coments $coments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComentsRequest $request, Coments $coments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coments $coments)
    {
        //
    }
}
