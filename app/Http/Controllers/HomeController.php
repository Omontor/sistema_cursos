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
use App\Models\IndexTestimonial;
use App\Models\Blog;
use App\Models\Ctum;
use App\Models\About;
use App\Models\User;
use App\Models\RoleUser;

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
        $testimonials = IndexTestimonial::orderBy('id', 'DESC')->take(5)->get();
        $posts = Blog::orderBy('id', 'DESC')->take(10)->get();
        $ctas = Ctum::first();
        return view('welcome', compact('company', 'sliders', 'featured', 'bullets', 'about', 'reasons', 'classes', 'testimonials', 'posts', 'ctas'));
    }

    public function about(){

        $about = About::first();
        return view('pages.about.about', compact('about'));
    }


    public function instructorindex(){

        $instructors = RoleUser::where('role_id', 3)->paginate(2);
        return view('pages.instructors.index', compact('instructors'));
    }

    public function instructor($id){

        $instructor = User::find($id);
        $courses = User::find($id)->courses()->paginate(3);
        return view('.pages.instructors.show', compact('instructor', 'courses'));

    }
}
