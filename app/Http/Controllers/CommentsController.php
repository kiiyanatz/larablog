<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $post_id)
    {
        //validate
        $this->validate($request, array(
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'comment' => 'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Your comment was posted');

        return redirect()->route('blog.single', [$post->slug]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->with('comment', $comment);
    }

    public function update(Request $request, $id)
    {
      $comment = Comment::find($id);
      $this->validate($request, array('comment' => 'required'));

      $comment->comment = $request->comment;

      $comment->save();

      Session::flash('success', 'Comment updated!');

      return redirect()->route('posts.show', [$comment->post->id]);
    }

    public function delete($id)
    {
      $comment = Comment::find($id);
      return view('comments.delete')->with('comment', $comment);
    }


    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'Comment deleted!');

        return redirect()->route('posts.show', $post_id);
    }
}
