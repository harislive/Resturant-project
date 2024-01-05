<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $special = category::where('name','special')->first();
        return view('welcome',compact('special'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function thankyou()
    {
        return view('thankyou');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
