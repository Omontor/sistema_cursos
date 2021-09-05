<?php

namespace App\Http\Controllers\Frontend;

class HomeController
{
    public function index()
    {
        return route('welcome');
    }
}
