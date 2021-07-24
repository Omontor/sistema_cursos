<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
       $loscursos = Course::all(); 
       return view ('pages.courses.index', compact('loscursos'));
    }
}
