<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Testimonial;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
	public function index()
	{
		$testimonials = Testimonial::makeRandom()->take(3)->get();
		$photos = Photo::randomize()->take(10)->get();
		return view('welcome', compact('testimonials', 'photos'));
	}

	public function categories()
	{

		$categories = Category::get();
		$photos = Photo::randomize()->take(16)->get();
		return view('categories', compact('categories', 'photos'));
	}

	public function photos($id)
	{
		$category = Category::find($id);

		


		return view('photos', compact('category'));
	}


	public function contact()
	{
		return view('contact');
	}


	public function newsletter()
	{
		return view('contact');
	}



	public function policy()
	{
		return view('policy');
	}



}
