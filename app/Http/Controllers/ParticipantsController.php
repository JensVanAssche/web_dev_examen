<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Code;
use App\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;

class ParticipantsController extends Controller
{
	public function index() {
		return view('form');
	}

	public function store(Request $request)
	{
		$request->validate([
	        'firstname' => 'required',
	        'lastname' => 'required',
	        'adress' => 'required',
	        'city' => 'required',
	        'zip' => 'required|numeric|digits:4',
	        'email' => 'required|email',
	        'code' => 'required|min:8|max:8|unique:codes'
	    ]);

	    if(Participant::where('email', '=', $request->input('email'))->exists()) {
	    	// email exists
	    	$p = Participant::where('email', '=', $request->input('email'))->first();

	    	// check of alle data overeenkomt met de gegeven email
	    	if ($p->firstname != $request->input('firstname')) {
	    		return redirect()->route('meedoen.index')->with('error', "First name doesn't match the record of the e-mail");
	    	}
	    	if ($p->lastname != $request->input('lastname')) {
	    		return redirect()->route('meedoen.index')->with('error', "Last name doesn't match the record of the e-mail");
	    	}
	    	if ($p->adress != $request->input('adress')) {
	    		return redirect()->route('meedoen.index')->with('error', "Adress doesn't match the record of the e-mail");
	    	}
	    	if ($p->city != $request->input('city')) {
	    		return redirect()->route('meedoen.index')->with('error', "City doesn't match the record of the e-mail");
	    	}
	    	if ($p->zip != $request->input('zip')) {
	    		return redirect()->route('meedoen.index')->with('error', "Zip doesn't match the record of the e-mail");
	    	}
	    }
	    else {
	    	// email doesnt exist
			$p = new Participant;
			$p->firstname = $request->input('firstname');
			$p->lastname = $request->input('lastname');
			$p->adress = $request->input('adress');
			$p->city = $request->input('city');
			$p->zip = $request->input('zip');
			$p->email = $request->input('email');
			$p->ip = $request->ip();
			$p->save();
	    }

		$c = new Code;
		$c->code = $request->input('code');
		$c->participant_id = $p->id;
		$c->save();		

		$currentDate = Carbon::now()->format('Y-m-d');
    	$currentAdmin = Admin::where('end', '>=', $currentDate)->first();
    	$currentCode = explode(",", $currentAdmin['code']);

    	foreach ($currentCode as $code) {
    		if ($c->code == $code) {
	    		$winBoolean = 1;
	    		Mail::send('emails.winner', ['firstname' => $request->input('firstname'),
											'lastname' => $request->input('lastname'),
											'adress' => $request->input('adress'),
											'city' => $request->input('city'),
											'zip' => $request->input('zip'),
											'email' => $request->input('email'),
											'code' => $request->input('code')],
					function ($message) {
						$message->from('admin@nutella.com', 'Admin');
						$message->to('teamtimocheese@gmail.com');
						$message->subject('Winnaar!');
			    });
		        break;
	    	}
	    	else {
	    		$winBoolean = 0;
	    	}
    	}

		return view('thankyou')->with('winBoolean', $winBoolean);
	}
}