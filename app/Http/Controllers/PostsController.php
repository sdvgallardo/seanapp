<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
      $posts = Post::latest()->get();
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
        'title' => 'required',
        'body' => 'required'
      ]);

      Post::create([
        'title' => request('title'),
        'body' => request('body')
      ]);
      //Redirect to homepage
      return redirect ('/blog');
    }
}
