<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $category = category::all();
       return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('public/Categoryimage');
        category::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
        ]);
        return to_route('admin.category.index')->with('success','Category Has Created');
    }

    /**
     * Display the specified resource.
     */

    public function edit(category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
            ]);
            $image = $category->image;
            if ($request->hasFile('image'))
             {
              Storage::delete($category->image);
              $image = $request->file('image')->store('public/Categoryimage');
            }
            $category->update(
                [
                    'name' => $request->name,
                    'image' => $image,
                    'description' => $request->description,
                ]);
                return to_route('admin.category.index')->with('success','Category Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        Storage::delete($category->image);
        $category->delete();
        return to_route('admin.category.index')->with('danger','Category has been Deleted');
    }
}
