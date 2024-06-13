<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chief;
use App\Models\Designation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class ChiefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chiefs = Chief::query()->select('slug', 'first_name', 'last_name','patronymic')->paginate(10);

        return view('admin.chief.index', compact('chiefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::all('id', 'title');
        return view('admin.chief.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic',
            'date_of_birth' => 'required',
            'phone' => 'required|unique:App\Models\Chief,phone',
            'designation_id'=>'integer',
            'instagram',
            'facebook',
            'twitter',
            'email' => 'required|email|unique:App\Models\Chief,email',
            'image' => 'required|image',
            'address' => 'required',
            'description' => 'required',
           'salary'=>'required',
        ]);
        $date = $request->all();
        $date['image'] = Chief::uploadImage($request);
        $date['rating'] = 0;
        Chief::query()->create($date);
        return redirect()->route('chiefs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $chief = Chief::query()->where('slug', $slug)->first();
        $designation = Designation::query()->find($chief->designation_id);
        return view('admin.chief.show', compact('chief', 'designation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $chief = Chief::query()->where('slug', $slug)->first();
        $designations = Designation::all('id', 'title');
        return view('admin.chief.edit', compact('chief', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $date = $request->all();

        $chief = Chief::query()->where('slug', $slug)->first();
        $validatePhone=$chief->phone == $date['phone']?'required':'required|unique:App\Models\Chief,phone';
        $validateEmail=$chief->email == $date['email']?'required|email':'required|email|unique:App\Models\Chief,email';
        $validateImage = $request->file('photo')==null?'':'required|image';
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic',
            'date_of_birth' => 'required',
            'phone' => $validatePhone,
            'designation_id'=>'integer',
            'instagram',
            'facebook',
            'twitter',
            'email' => $validateEmail,
            'photo' => $validateImage,
            'address' => 'required',
            'description' => 'required',
            'salary'=>'required',
        ]);

        $date['image'] = Chief::uploadImage($request, $request->old_image);
        $date['rating'] = 0;
        $chief->update($date);

        return redirect()->route('chiefs.index')->with('success', 'The change has been saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {

        $chief = Chief::query()->where('slug', $slug)->first();
        Storage::delete($chief->image);
        $chief->delete();
        return redirect()->route('chiefs.index')->with('success', 'The record has been deleted');
    }
}
