<?php

namespace App\Http\Controllers;

use App\Mail\QuoteSend;
use App\Mail\QuoteThanks;
use Illuminate\Http\Request;
use LVR\Phone\Phone;
use Mail;



class QuoteController extends Controller
{
   

	public function send(Request $request)
	{
		$request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email',
			'phone' => ['required', new Phone],
			'message_body' => 'required'	
		]);

		Mail::to($request->email)->queue(new QuoteThanks($name = $request->name));
		Mail::to('info@crystalbars.co.za')->queue(new QuoteSend($data = $request->only('name', 'email', 'phone', 'message_body')));
		
	
		return back()->withSuccess('Email Send');
	}



}
