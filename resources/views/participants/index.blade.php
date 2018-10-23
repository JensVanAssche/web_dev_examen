@extends('participants.master')

@section('content')
	<a href="/">Terug naar home</a>
	<div class="card mb-3">
		<div class="card-header">
			<h5 data-toggle="collapse" href="#periodescollapse">Wedstrijd periodes instellen</h5>
		</div>
		<div class="card-body collapse" id="periodescollapse">
			<form>
				<div class="form-row">
					<div class="col-1"><p>Periode 1</p></div>
					<div class="col-5"><input type="date" name="p1a" class="form-control"></div>
					<div class="col-5"><input type="date" name="p1b" class="form-control"></div>
				</div>
				<div class="form-row">
					<div class="col-1"><p>Periode 2</p></div>
					<div class="col-5"><input type="date" name="p2a" class="form-control"></div>
					<div class="col-5"><input type="date" name="p2b" class="form-control"></div>
				</div>
				<div class="form-row">
					<div class="col-1"><p>Periode 3</p></div>
					<div class="col-5"><input type="date" name="p3a" class="form-control"></div>
					<div class="col-5"><input type="date" name="p3b" class="form-control"></div>
				</div>
				<div class="form-row mb-3">
					<div class="col-1"><p>Periode 4</p></div>
					<div class="col-5"><input type="date" name="p4a" class="form-control"></div>
					<div class="col-5"><input type="date" name="p4b" class="form-control"></div>
				</div>
				<button class="btn btn-primary">Toepassen</button>
			</form>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 data-toggle="collapse" href="#crudcollapse">Deelnemers CRUD</h5>
		</div>
		<div class="card-body collapse" id="crudcollapse">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif

			<table>
				<tr>
					<th>Voornaam</th>
					<th>Achternaam</th>
					<th>Adres</th>
					<th>Stad</th>
					<th>Postcode</th>
					<th>E-Mail</th>
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