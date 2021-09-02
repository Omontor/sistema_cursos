<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumThread;


class ForumController extends Controller
{
  public function index() {

    $threads = ForumThread::all();
    return view('pages.forum.index', compact('threads'));
  }
}
