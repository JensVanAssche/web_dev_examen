<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
	public function index()
    {
        $participants = Participant::all();
        return view('participants.index')->with('participants', $participants);
    }

    public function store(Request $request)
	{
		$request->validate([
	        'firstname' => 'required',
	        'lastname' => 'required',
	        'adress' => 'required',
	        'city' => 'required',
	        'zip' => 'required|numeric|digits:4',
	        'email' => 'required|email|unique:participants'
	    ]);
		$participant = Participant::create($request->all());
		return redirect('/dankjewel');
	}

	public function destroy($id)
	{     
		$participant = Participant::findOrFail($id);
	    $participant->delete();
	    return redirect()->route('dashboard.index')->with('success', 'Deelnemer succesvol verwijderd');
	}
}