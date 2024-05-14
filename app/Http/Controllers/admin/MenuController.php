<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Type;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dump(Menu::all());
        return view('admin.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all('id', 'title');

        return view('admin.menu.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required|image',
            'price'=> 'required|integer',
        ]);
        $image = $request->file('image')->store('images/menu');
       $menu= Menu::query()->create([
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $image,
            'price'=> $request->price,
        ]);
        $menu->types()->sync($request->types);
        return redirect()->route('menus.index');
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
