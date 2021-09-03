<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumThread;
use App\Models\ForumComment;


class ForumController extends Controller
{
  public function index() {

    $threads = ForumThread::paginate(10);
    return view('pages.forum.index', compact('threads'));
  }


  public function show($id) {


    $thread = ForumThread::find($id);
    $comments = ForumComment::where('thread_id', $id)->paginate(5);
    return view('pages.forum.show', compact('thread', 'comments'));

  }


}
