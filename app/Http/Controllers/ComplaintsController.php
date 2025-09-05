<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use App\Http\Requests\StoreComplaintsRequest;
use App\Http\Requests\UpdateComplaintsRequest;

class ComplaintsController extends Controller
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
    public function store(StoreComplaintsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaints $complaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaints $complaints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintsRequest $request, Complaints $complaints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaints $complaints)
    {
        //
    }
}
