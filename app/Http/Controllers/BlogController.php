<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

	public function getIndex()
    {
    	$posts = Post::paginate(5);
    	return view('blog.index')->with('posts', $posts);
    }

    public function getSingle($slug)
    {
    	// Fetch from db based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	// Return view and pass post object
    	return view('blog.single')->with('post', $post);
    }

}
