<?php

namespace App\Http\Controllers;
use App\Post;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts){
      $posts = Post::latest()
      ->filter(request(['month', 'year']))
      ->get();

      return view('blog.index', compact('posts'));
    }

    public function show(Post $post){
      return view('blog.show', compact('post'));
    }

    public function create(){
      return view('blog.create');
    }

    public function store(){
      $this->validate(request(), [
        'title' => 'required|max:100',
        'body' => 'required'
      ]);

      Post::create([
        'title' => request('title'),
        'body' => request('body'),
        'user_id' => auth()->id()
      ]);
      //Redirect to homepage
      return redirect ('/blog');
    }
}
