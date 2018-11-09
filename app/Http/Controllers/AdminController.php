<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Code;
use App\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParticipantExport;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function index()
	{
		if (Auth::check()) {
			$participants = Participant::all();
			$codes = Code::all();
			$admin = Admin::all();
			return view('participants.index')->with('participants', $participants)->with('codes', $codes)->with('admin', $admin);
		}
		else {
			return redirect('/');
		}
	}

	public function indexWinners()
	{
		$winners = [];
		for ($i = 1; $i < 5; $i++) {
			$periodWinners = [];
			$period = Admin::where('period', '=', "$i")->first();
			$codes = explode(",", $period['code']);

			foreach ($codes as $code) {
				$winningCode = Code::whereRaw("BINARY `code`= ?", $code)->first();
				if (empty($winningCode)) {
					
				}
				else {
					array_push($periodWinners, Participant::where('id', '=', $winningCode['participant_id'])->select('firstname', 'lastname')->first());
				}
			}
			array_push($winners, $periodWinners);
		}
		
		$currentDate = Carbon::now()->format('Y-m-d');
		$currentAdmin = Admin::where('start', '<=', $currentDate)->where('end', '>=', $currentDate)->first();
		if($currentAdmin == Null) {
			$currentPeriod = 0;
			$currentPeriodStart = Admin::where('start', '>=', $currentDate)->first();
			$nextPeriod = date('d/m/Y', strtotime($currentPeriodStart['start']));
		}
		else {
			$currentPeriod['start'] = date('d/m/Y', strtotime($currentAdmin['start']));
			$currentPeriod['end'] = date('d/m/Y', strtotime($currentAdmin['end']));
		}

		return view('welcome')->with('currentPeriod', $currentPeriod)->with('winners', $winners)->with('nextPeriod', $nextPeriod);
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

	        'period1code' => 'required',
	        'period2code' => 'required',
	        'period3code' => 'required',
	        'period4code' => 'required'
	    ]);

	    if($request->input('period1start') >= $request->input('period1end')) {
	    	return redirect()->route('dashboard.index')->with('error', "Periode 1 niet correct ingesteld");
	    }
	    if($request->input('period2start') >= $request->input('period2end')) {
	    	return redirect()->route('dashboard.index')->with('error', "Periode 2 niet correct ingesteld");
	    }
	    if($request->input('period3start') >= $request->input('period3end')) {
	    	return redirect()->route('dashboard.index')->with('error', "Periode 3 niet correct ingesteld");
	    }
	    if($request->input('period4start') >= $request->input('period4end')) {
	    	return redirect()->route('dashboard.index')->with('error', "Periode 4 niet correct ingesteld");
	    }

	    $codep1array = explode(",", $request->input('period1code'));
	    $codep2array = explode(",", $request->input('period2code'));
	    $codep3array = explode(",", $request->input('period3code'));
		$codep4array = explode(",", $request->input('period4code'));

    	foreach ($codep1array as $code) {
    		if(strlen($code) != 8) {
    			return redirect()->route('dashboard.index')->with('error', "Code 1 moet 8 karakters lang zijn");
    		}
    	}
    	foreach ($codep2array as $code) {
    		if(strlen($code) != 8) {
    			return redirect()->route('dashboard.index')->with('error', "Code 2 moet 8 karakters lang zijn");
    		}
    	}
    	foreach ($codep3array as $code) {
    		if(strlen($code) != 8) {
    			return redirect()->route('dashboard.index')->with('error', "Code 3 moet 8 karakters lang zijn");
    		}
    	}
    	foreach ($codep4array as $code) {
    		if(strlen($code) != 8) {
    			return redirect()->route('dashboard.index')->with('error', "Code 4 moet 8 karakters lang zijn");
    		}
    	}

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

	    return redirect()->route('dashboard.index')->with('success', 'Wedstrijd periodes en codes succesvol aangepast');
    }

    public function excel()
    {
    	return Excel::download(new ParticipantExport, 'participants.xlsx');
    }

    public function destroy($id)
	{
		$participant = Participant::findOrFail($id);
	    $participant->delete();
	    return redirect()->route('dashboard.index')->with('success', 'Deelnemer succesvol verwijderd');
	}
}
