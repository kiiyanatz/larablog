<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Session;
use App\Category;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        // Get posts from db
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        // Return view with all blog posts
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with(['tags' => $tags, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, array(
          'title' => 'required|max:255',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'body' => 'required'
        ));

        // Store data in db
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        $post->body = $request->body;
        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Post has been created!');

        // Redirect to page
        return redirect()->route('posts.show', $post->id);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        // Find the post to be edited
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];
        return view('posts.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validate
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category');
        $post->body = $request->input('body');
        // Push to db

        $post->save();

        $post->tags()->sync($request->tags, true);

        // Notify at show page
        Session::flash('success', 'Post was updated!');

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'Post has been deleted');
        return redirect()->route('posts.index');
    }
}
