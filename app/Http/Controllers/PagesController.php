<?php

namespace App\Http\Controllers;

class PagesController extends Controller {
	
	public function getIndex() {
		return view('pages.welcome');
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
