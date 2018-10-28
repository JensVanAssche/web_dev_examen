@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card p-4">
                <h1 class="color-red">Danku voor uw deelname!</h1>
                @if($winBoolean == 1)
                    <p class="m-0">Gefeliciteerd! Uw code is een winnende code!</p>
                    <p class="m-0">Wij sturen u een e-mail met alle specifiekaties van uw prijs.</p>
                    <p class="m-0">Geniet ervan!</p>
                @else
                    <p class="m-0">Sorry, deze code is geen winnende code in deze periode.</p>
                    <p class="m-0">Probeer zeker opnieuw!</p>
                @endif
                <a href="/" class="mt-2">Terug naar de homepage</a>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection