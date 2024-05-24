<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $title='home';

        return view('front.home', compact('title'));
    }

    public function about()
    {
        $title='about';

        return view('front.about', compact('title'));
    }

    public function testimonial()
    {
        $title='testimonial';

        return view('front.testimonial', compact('title'));
    }

    public function team()
    {
        $title = 'team';
        return view('front.team', compact('title'));
    }

    public function booking()
    {
        $title = 'booking';
        return view('front.booking', compact('title'));
    }

    public function contact()
    {
        $title='contact';
        return view('front.contact', compact('title'));
    }

    public function menu()
    {
        $title='menu';
        return view('front.menu', compact('title'));
    }

    public function service()
    {
        $title='service';
        return view('front.service', compact('title'));
    }
public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|email',
            'date_time' => 'required',
            'number_of_persons' => 'required',
            'special_request'
        ]);
        $d = $request->date_time;

        $date = strtotime($d);
        $date =date ('o-m-d H:i', $date);

        Booking::query()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'date_time'=>$date,
            'number_of_persons'=>$request->number_of_persons,
            'special_request'=>$request->special_request,
        ]);
        return redirect()->back()->with('success', 'The table is reserved');
    }

}
