@extends('participants.master')

@section('content')
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	@if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	<div class="mb-2">
		<a href="/">Terug naar home</a>
	</div>
	<div class="card mb-3">
		<div class="card-header">
			<h5>Wedstrijd periodes & codes instellen</h5>
		</div>
		<div class="card-body">
			<form method="POST" action="{{ url('/dashboard') }}">
				{{ csrf_field() }}
				<div class="form-row">
					<div class="col-1"></div>
					<div class="col-3"><p class="font-weight-bold">Periode start</p></div>
					<div class="col-3"><p class="font-weight-bold">Periode eind</p></div>
					<div class="col-5"><p class="font-weight-bold">Codes (8 karakters, gescheiden door een komma)</p></div>
				</div>
				<div class="form-row">
					<div class="col-1 font-weight-bold"><p>Periode 1</p></div>
					@if (!$admin->isEmpty())
						<div class="col-3"><input type="date" name="period1start" class="form-control" value="{{ $admin[0]->start }}"></div>
						<div class="col-3"><input type="date" name="period1end" class="form-control" value="{{ $admin[0]->end }}"></div>
						<div class="col-5"><input type="text" name="period1code" class="form-control" value="{{ $admin[0]->code }}"></div>
					@else
						<div class="col-3"><input type="date" name="period1start" class="form-control"></div>
						<div class="col-3"><input type="date" name="period1end" class="form-control"></div>
						<div class="col-5"><input type="text" name="period1code" class="form-control"></div>
					@endif
				</div>
				<div class="form-row">
					<div class="col-1 font-weight-bold"><p>Periode 2</p></div>
					@if (!$admin->isEmpty())
						<div class="col-3"><input type="date" name="period2start" class="form-control" value="{{ $admin[1]->start }}"></div>
						<div class="col-3"><input type="date" name="period2end" class="form-control" value="{{ $admin[1]->end }}"></div>
						<div class="col-5"><input type="text" name="period2code" class="form-control" value="{{ $admin[1]->code }}"></div>
					@else
						<div class="col-3"><input type="date" name="period2start" class="form-control"></div>
						<div class="col-3"><input type="date" name="period2end" class="form-control"></div>
						<div class="col-5"><input type="text" name="period2code" class="form-control"></div>
					@endif
				</div>
				<div class="form-row">
					<div class="col-1 font-weight-bold"><p>Periode 3</p></div>
					@if (!$admin->isEmpty())
						<div class="col-3"><input type="date" name="period3start" class="form-control" value="{{ $admin[2]->start }}"></div>
						<div class="col-3"><input type="date" name="period3end" class="form-control" value="{{ $admin[2]->end }}"></div>
						<div class="col-5"><input type="text" name="period3code" class="form-control" value="{{ $admin[2]->code }}"></div>
					@else
						<div class="col-3"><input type="date" name="period3start" class="form-control"></div>
						<div class="col-3"><input type="date" name="period3end" class="form-control"></div>
						<div class="col-5"><input type="text" name="period3code" class="form-control"></div>
					@endif
				</div>
				<div class="form-row mb-3">
					<div class="col-1 font-weight-bold"><p>Periode 4</p></div>
					@if (!$admin->isEmpty())
						<div class="col-3"><input type="date" name="period4start" class="form-control" value="{{ $admin[3]->start }}"></div>
						<div class="col-3"><input type="date" name="period4end" class="form-control" value="{{ $admin[3]->end }}"></div>
						<div class="col-5"><input type="text" name="period4code" class="form-control" value="{{ $admin[3]->code }}"></div>
					@else
						<div class="col-3"><input type="date" name="period4start" class="form-control"></div>
						<div class="col-3"><input type="date" name="period4end" class="form-control"></div>
						<div class="col-5"><input type="text" name="period4code" class="form-control"></div>
					@endif
				</div>
				<button type="submit" class="btn btn-success">Toepassen</button>
			</form>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 >Deelnemers</h5>
		</div>
		<div class="card-body">
			<table>
				<tr>
					<th>Voornaam</th>
					<th>Achternaam</th>
					<th>Adres</th>
					<th>Stad</th>
					<th>Postcode</th>
					<th>E-Mail</th>
					<th>Codes</th>
					<th>Acties</th>
				</tr>

				@foreach ($participants as $participant)
					<tr>
						<td>{{ $participant->firstname }}</td>
						<td>{{ $participant->lastname }}</td>
						<td>{{ $participant->adress }}</td>
						<td>{{ $participant->city }}</td>
						<td>{{ $participant->zip }}</td>
						<td>{{ $participant->email }}</td>
						<td>
							@foreach ($codes as $code)
								@if ($code->participant_id == $participant->id)
									<p class="m-0">{{ $code->code }}</p>
								@endif
							@endforeach
						</td>
						<td>
							{!! Form::open(['method'=>'DELETE', 'route'=>['dashboard.destroy', $participant->id], 'style'=>'display: inline']) !!}
							{!! Form::submit('Delete',['class'=>'btn btn-sm btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection