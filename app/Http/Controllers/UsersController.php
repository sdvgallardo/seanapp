<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index($userID){
      $user = User::selectRaw('*')
        ->where('id', $userID)
        ->get();

      $user = $user->get(0);

      // Looks for posts with a user_id of the one passed in
      $posts = Post::latest()
        ->selectRaw('*')
        ->where('user_id', $userID)
        ->paginate(4);

      return view('blog.user', compact('posts', 'user'));
    }
}
