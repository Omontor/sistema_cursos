<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Slider;
use App\Models\FeaturedCourse;
use App\Models\Bullet;
use App\Models\IndexAbout;
use App\Models\IndexReason;
use App\Models\OnlineClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company = Company::first();
        $sliders = Slider::all()->shuffle();
        $featured = FeaturedCourse::all();
        $bullets = Bullet::orderBy('id', 'ASC')->take(3)->get();
        $about = IndexAbout::first();
        $reasons = IndexReason::orderBy('id', 'ASC')->take(4)->get();
        $classes = OnlineClass::orderBy('start', 'DESC')->take(3)->get();
        return view('welcome', compact('company', 'sliders', 'featured', 'bullets', 'about', 'reasons', 'classes'));
    }
}
