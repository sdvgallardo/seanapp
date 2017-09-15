<?php

namespace App\Http\Controllers;
use App\Post;
use DB;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index', 'show', 'archives']);
    }

    public function archives($month, $year){
      // Sets an array we're going to use to filter
      $archives = array('month' => $month, 'year' => $year);

      // Filters using the function we have in the Post model, then paginates
      $posts = Post::latest()
        ->filter($archives)
        ->paginate(4);

      return view('blog.index', compact('posts'));
    }

    public function index(Post $posts){
      // Gather the posts normally, 4 per page
      $posts = Post::latest()->paginate(4);

      return view('blog.index', compact('posts'));
    }

    public function show(Post $post){
      return view('blog.show', compact('post'));
    }

    public function create(){
      return view('blog.create');
    }

    public function edit(Post $post){
      // dd($post);
      $tags = $post->tags->toArray();
      return view('blog.editPost', compact('post', 'tags'));
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
      }

      $tags = array_unique($tags);

      foreach($tags as $tag){
        DB::insert('insert into tags (name, post_id) values (? , ?)', [$tag, $post->id]);
      }


      session()->flash('message', 'Your post has now been published');
      //Redirect to homepage
      return redirect ('/blog');
    }
}
