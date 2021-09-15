<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class ContactController extends Controller
{
    public function index() {

        $company = Company::latest()->take(1)->first();
        return view('pages.contact.index', compact('company'));
    }

    public function store(){

    }
}
