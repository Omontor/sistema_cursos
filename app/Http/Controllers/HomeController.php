<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Slider;
use App\Models\FeaturedCourse;
use App\Models\Bullet;
use App\Models\IndexAbout;

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
        return view('welcome', compact('company', 'sliders', 'featured', 'bullets', 'about'));
    }
}
