<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index($userID)
    {
        $user = User::find($userID);

        // Looks for posts with a user_id of the one passed in
        $posts = Post::latest()
          ->selectRaw('*')
          ->where('user_id', $userID)
          ->paginate(4);

        return view('blog.user', compact('posts', 'user'));
    }

    public function archives($month, $year, $userID)
    {
        // Sets an array we're going to use to filter
        $archives = array('month' => $month, 'year' => $year, 'user' => $userID);

        $user = User::find($userID);

        // Filters using the function we have in the Post model, then paginates
        $posts = Post::latest()
          ->filter($archives)
          ->paginate(4);

        return view('blog.user', compact('posts', 'user'));
    }

    public function tag(Tag $tag, User $user)
    {
        //Grabs the posts of a certain tag name using a join, then paginates
        $posts = Post::latest()
          ->join('tags', 'posts.id', '=', 'tags.post_id')
          ->select('posts.*')
          ->where('tags.name', $tag->name)
          ->where('posts.user_id', $user->id)
          ->paginate(4);

        return view('blog.user', compact('posts', 'user'));
    }

    public function edit(User $user)
    {
        $posts = Post::latest()
          ->selectRaw('*')
          ->where('user_id', $user->id)
          ->paginate(4);

        return view('blog.editUser', compact('posts', 'user'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
          'name' => 'required|max:100',
        ]);

        $ext = request()->file('avatar')->Extension();
        request()->file('avatar')->storeAs('/public/avatars', $user->username . '.'. $ext);

        User::where('id', $user->id)
          ->update([
            'name' => request('name'),
            'bio' => request('bio'),
            'location' => request('location'),
            'avatar' => '/storage/avatars'. '/'. $user->username . '.' . $ext
          ]);

        return redirect('/blog/user'. '=' . $user->id);
    }
}
