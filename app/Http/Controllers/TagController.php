<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{

	public function __construct()
	{
		// Only authenticated users
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
        	'name' => 'required|max:255'
        ));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'New Tag was created!');
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = Tag::Find($id);
        return view('tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::Find($id);
        $this->validate($request, ['name' => 'required|max:255']);

        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Tag updated!');

        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $tag = Tag::find($id);
        
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success', 'Tag has been deleted');
        return redirect()->route('tags.index');
    }
}
