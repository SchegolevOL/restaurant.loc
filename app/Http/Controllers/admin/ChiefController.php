<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chief;
use App\Models\Designation;
use Illuminate\Http\Request;

class ChiefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chiefs = Chief::all();
        dump($chiefs->all());
        return'index';
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
            'photo' => 'required|image',
        ]);
        $path = $request->file('photo')->store('images/chief');
        Chief::query()->create([
            'designation_id'=> $request->designation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'patronymic' => $request->patronymic,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'email' => $request->email,
            'image' => $path,
        ]);

        return redirect()->route('chiefs.index');

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
