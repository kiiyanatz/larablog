<?php

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', function() {
	$comments = [];
	$tags = [];
	$posts = [];
	$category = '';
	$posts = Post::orderBy('id', 'desc')->get();
	foreach($posts as $post) {
		$post->body = strip_tags($post->body);
		$tags = $post->tags;
		$comments = $post->comments;
		$category = $post->category->name;
	}
	//$posts['comments'] = $comments;
	//$posts['tags'] = $tags;
	//$posts['category'] = $category;
	return response()->json($posts);
});

Route::get('post/{id}', function($id) {
	$post = Post::find($id);
	return response()->json($post);
});

Route::get('post/{id}/comments', function($post_id) {
	$post = Post::find($post_id);
	$comments = $post->comments;
	return response()->json($comments);
});

Route::get('post/{id}/tags', function($post_id) {
	$post = Post::find($post_id);
	$tags = $post->tags;
	return response()->json($tags);
});

Route::get('post/{id}/category', function($post_id) {
	$post = Post::find($post_id);
	$category = $post->category;
	return response()->json($category);
});

Route::post('post/{id}', function(Request $request, $post_id) {
	$comment = New Comment;
	$comment->name = $request->input('name');
	$comment->email = $request->input('email');
	$comment->comment = $request->input('comment');
	$comment->post_id = $post_id;
	$comment->approved = 1;
	$comment->save();
	return response()->json($comment);
});
