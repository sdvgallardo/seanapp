<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
      $posts = Post::all();
      return view('blog.index', compact('posts'));
    }

    public function show(){
      return view('blog.show');
    }

    public function create(){
      return view('blog.create');
    }

    public function store(){

      Post::create([
        'title' => request('title'),
        'body' => request('body')
      ]);

      //Redirect to homepage
      return redirect ('/blog');
    }
}
