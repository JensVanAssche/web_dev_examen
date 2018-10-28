<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Code;
use App\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        $codes = Code::all();
        $admin = Admin::all();
        return view('participants.index')->with('participants', $participants)->with('codes', $codes)->with('admin', $admin);
    }

    public function indexWinners()
    {
    	$currentDate = Carbon::now()->format('Y-m-d');
    	$currentAdmin = Admin::where('end', '>', $currentDate)->first();
    	$winningCode = Code::where('code', '=', $currentAdmin['code'])->first();

    	if ( empty($winningCode) ) {
    		$winner = null;
    	}
    	else {
    		$winner = Participant::where('id', '=', $winningCode['participant_id'])->select('firstname', 'lastname')->first();
    	}

    	return view('welcome')->with('currentAdmin', $currentAdmin)->with('winner', $winner);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'period1start' => 'required',
    		'period2start' => 'required',
    		'period3start' => 'required',
    		'period4start' => 'required',

    		'period1end' => 'required',
    		'period2end' => 'required',
    		'period3end' => 'required',
    		'period4end' => 'required',

	        'period1code' => 'required|min:8|max:8',
	        'period2code' => 'required|min:8|max:8',
	        'period3code' => 'required|min:8|max:8',
	        'period4code' => 'required|min:8|max:8'
	    ]);

		$a1 = new Admin;
	    $a1->period = 1;
	    $a1->start = $request->input('period1start');
	    $a1->end = $request->input('period1end');
	    $a1->code = $request->input('period1code');
	    $a2 = new Admin;
	    $a2->period = 2;
	    $a2->start = $request->input('period2start');
	    $a2->end = $request->input('period2end');
	    $a2->code = $request->input('period2code');
	    $a3 = new Admin;
	    $a3->period = 3;
	    $a3->start = $request->input('period3start');
	    $a3->end = $request->input('period3end');
	    $a3->code = $request->input('period3code');
	    $a4 = new Admin;
	    $a4->period = 4;
	    $a4->start = $request->input('period4start');
	    $a4->end = $request->input('period4end');
	    $a4->code = $request->input('period4code');
	    
	    Admin::truncate();

	    $a1->save();
	    $a2->save();
	    $a3->save();
	    $a4->save();

	    return redirect()->route('dashboard.index')->with('success', 'Wedstrijd periodes/codes succesvol aangepast');
    }

    public function destroy($id)
	{
		$participant = Participant::findOrFail($id);
	    $participant->delete();
	    return redirect()->route('dashboard.index')->with('success', 'Deelnemer succesvol verwijderd');
	}
}
