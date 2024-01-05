<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table = Table::all();
        return view('admin.table.index',compact('table'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {
        Table::create(
            [
                'name' => $request->name,
                'guest_number' => $request->guest_number,
                'location' => $request->location,
                'status' => $request->status,
            ]);
            return to_route('admin.table.store')->with('success','Table Has Created');
    }

    /**
     * Display the specified resource.
     */

    public function edit(Table $table)
    {
        return view('admin.table.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update($request->validated());
        return to_route('admin.table.index')->with('success','Table Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return to_route('admin.table.index')->with('danger','Table has Deleted');

    }
}
