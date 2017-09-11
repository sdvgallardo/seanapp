<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function index(Tag $tag){
      // $posts = $tag->post()->latest()->paginate(4);
      dd($tag);


      return view('blog.index', compact('posts'));
    }
}
