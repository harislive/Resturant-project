<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $menu = Menu::all();
      return view('admin.menu.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();
        return view('admin.menu.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menuimage');
        $menu = Menu::create(
            [
                'name' => $request->name,
                'image' => $image,
                'price' => $request->price,
                'description' => $request->description,
            ]);
            if ($request->has('category'))
             {
              $menu->Categorys()->attach($request->category);
            }
            return to_route('admin.menu.index')->with('success','Menu Has Created');
    }

    /**
     * Display the specified resource.
     */



    public function edit(Menu $menu)
    {
        $category = category::all();
        return view('admin.menu.edit',compact('menu','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required'
            ]);
            $image = $menu->image;
            if ($request->hasFile('image'))
             {
               Storage::delete($menu->image);
                $image = $request->file('image')->store('public/menuimage');
            }

           $menu->update(
                [
                    'name' => $request->name,
                    'image' => $image,
                    'price' => $request->price,
                    'description' => $request->description
                ]);

                if ($request->has('category'))
                 {
                 $menu->Categorys()->attach($request->category);
                }
                return to_route('admin.menu.index')->with('success','Menu Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->Categorys()->detach();
        $menu->delete();
        return to_route('admin.menu.index')->with('danger','Menu has Deleted');

    }
}
