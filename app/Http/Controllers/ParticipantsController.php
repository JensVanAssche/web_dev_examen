<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Code;
use App\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ParticipantsController extends Controller
{
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
	    	//email exists
	    	$p = Participant::where('email', '=', $request->input('email'))->first();
	    }
	    else {
	    	//email doesnt exist
			$p = new Participant;
			$p->firstname = $request->input('firstname');
			$p->lastname = $request->input('lastname');
			$p->adress = $request->input('adress');
			$p->city = $request->input('city');
			$p->zip = $request->input('zip');
			$p->email = $request->input('email');
			$p->save();
	    }

		$c = new Code;
		$c->code = $request->input('code');
		$c->participant_id = $p->id;
		$c->save();

		$currentDate = Carbon::now()->format('Y-m-d');
    	$currentAdmin = Admin::where('end', '>', $currentDate)->first();
    	$currentCode = explode(",", $currentAdmin['code']);

    	foreach ($currentCode as $code) {
    		if ($c->code == $code) {
	    		$winBoolean = 1;
	    		break;
	    	}
	    	else {
	    		$winBoolean = 0;
	    	}
    	}

		return view('thankyou')->with('winBoolean', $winBoolean);
	}
}