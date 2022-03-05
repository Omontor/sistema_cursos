<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class CoursesController extends Controller
{
    public function index()
    {
       $loscursos = Course::paginate(6);
       return view ('pages.courses.index', compact('loscursos'));
    }

    public function single($id)
    {
       $elcurso = Course::find($id); 
       return view ('pages.courses.single', compact('elcurso'));
    }
}
