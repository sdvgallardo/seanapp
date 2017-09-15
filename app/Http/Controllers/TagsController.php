<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag){

      //Grabs the posts of a certain tag name using a join, then paginates
      $posts = Post::latest()
        ->join('tags', 'posts.id', '=', 'tags.post_id')
        ->select('posts.*')
        ->where('tags.name', $tag->name)
        ->paginate(4);

      return view('blog.index', compact('posts'));
    }
}
