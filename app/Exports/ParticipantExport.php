<?php

namespace App\Exports;

use App\Participant;
use App\Code;
use Maatwebsite\Excel\Concerns\FromCollection;

class ParticipantExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$participants = Participant::all();
		$codes = Code::All();

		

		foreach ($participants as $participant) {
			foreach ($codes as $code) {
				if ($code->participant_id == $participant->id) {
					$participant['codes'] .= $code->code;
					$participant['codes'] .= ', ';
				}
			}
		}

		$participants->prepend(['id', 'firstname', 'lastname', 'adress', 'city', 'zip', 'email', 'ip', 'created_at', 'updated_at', 'deleted_at', 'codes']);

		return $participants;
	}
}
