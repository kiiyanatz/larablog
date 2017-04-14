<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller {
	
	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->with('posts', $posts);
	}

	public function getAbout() {
		$firstName = 'Erick';
		$lastName = 'Kiiya';

		$full = $firstName . " " . $lastName;
		$email = "kiiyaerick@gmail.com";
		$data['full'] = $full;
		$data['email'] = $email;
		return view('pages.about')->with($data);
	}

	public function getContact()
	{
		return view('pages.contact');
	}

	public function postContact()
	{}
}
