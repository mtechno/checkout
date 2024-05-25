<?php

namespace App\Http\Controllers;

use App\Models\Automobile;
use App\Http\Requests\StoreAutomobileRequest;
use App\Http\Requests\UpdateAutomobileRequest;

class AutomobileController extends Controller
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
    public function store(StoreAutomobileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Automobile $automobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Automobile $automobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutomobileRequest $request, Automobile $automobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Automobile $automobile)
    {
        //
    }
}
