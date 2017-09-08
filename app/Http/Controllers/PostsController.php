<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use DB;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts){
      // Gather the posts normally, 4 per page
      $posts = Post::latest()->paginate(4);

      // If there is a specific month request
      if( request('month')){
        $posts = Post::latest()
        ->filter(request(['month', 'year'])) //Gather those archives
        ->paginate(); //If there's no number, it displays them all on one page
      }

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

      $tags = explode(',' , request('tags'));
      //dd($tags);


      $post = Post::create([
        'title' => request('title'),
        'body' => request('body'),
        'user_id' => auth()->id()
      ]);

      foreach($tags as $tag){
        $tag = trim($tag);
        $tag = strtolower($tag);
        DB::insert('insert into tags (name, post_id) values (? , ?)', [$tag, $post->id]);


      }


      session()->flash('message', 'Your post has now been published');
      //Redirect to homepage
      return redirect ('/blog');
    }
}
