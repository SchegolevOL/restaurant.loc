<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        $title = 'register';
        return view('user.register', compact('title'));
    }
    public  function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'image'=> 'required|image',

        ]);
        $image = $request->file('image')->store('images/user');
        //dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image'=>$image,
        ]);
        event(new Registered($user));
        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);
        return redirect()->route('verification.notice');
    }
    public function loginForm(){
        $title='login';
        return view('user.login', compact('title'));
    }
    public  function login(Request $request){
        $request->validate([

            'email' => 'required|email',
            'password' => 'required',

        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'You are logged');
            if (Auth::user()->is_admin) {
                return redirect()->route('home');
            } else {
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('error', 'Incorrect login or password');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
