<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Session;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{

    public function index()
    {
        // Get posts from db
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        // Return view with all blog posts
        return view('posts.index')->with('posts', $posts);
    }
}
