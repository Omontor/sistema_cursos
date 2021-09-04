<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumThread;
use App\Models\ForumComment;
use App\Models\ForumCategory;


class ForumController extends Controller
{
  public function index() {

    $threads = ForumThread::latest()->take(3)->get();
    $categories = ForumCategory::paginate(8);
    return view('pages.forum.index', compact('threads', 'categories'));
  }


  public function show($id) {


    $thread = ForumThread::find($id);
    $comments = ForumComment::where('thread_id', $id)->paginate(5);
    return view('pages.forum.show', compact('thread', 'comments'));

  }


  public function createthread($id) {


    $category = ForumCategory::find($id);

    return view('frontend.ForumThreads.create', compact('category'));

  }



}
