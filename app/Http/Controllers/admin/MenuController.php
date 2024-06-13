<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Type;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::query()->paginate();
        return view('admin.menu.index', compact('menus'));
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
            'description'=> 'required|max:255',
            'image'=> 'required|image',
            'price'=> 'required|integer',
        ]);
        $image = $request->file('image')->store('images/menu');
        $manager = new ImageManager(new Driver());
        $image_resize = $manager->read($image);
        $image_resize->resize(80,80);
        $image_resize->save($image);
        $image = "/public/".$image;
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
    public function show(string $slug)
    {
        $menu=Menu::query()->where('slug',$slug)->first();
        $types=$menu->types;

        return view('admin.menu.show', compact('menu'));
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
