<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    

	public function index()
	{
		$cats = Category::get();
		return view('admin.index', compact('cats'));
	}



}
