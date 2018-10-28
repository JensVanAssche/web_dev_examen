@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-center main-title mb-5">Nutella's Grote Wedstrijd</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <h4 class="mb-5">Met de code op het deksel van je Nutella pot kan je veel prijzen winnen! Waag nu je kans!</h4>
            <h4>Deze periode loopt van</h4>
            <p class="mb-2">{{ $currentAdmin['start'] }}</p>
            <h4>tot</h4>
            <p class="mb-2">{{ $currentAdmin['end'] }}</p>
        </div>
        <div class="col">
            <h2>Prijzen</h2>
            <p>prijzen hier</p>

            <h2>Winnaars</h2>
            @foreach($winners as $winner)
                <p class="mb-2">{{ $winner['firstname']}} {{ $winner['lastname']}}</p>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="/meedoen" class="btn btn-danger btn-lg py-3 px-4">Deelnemen!</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="/images/jar.png" class="main-jar">
        </div>
    </div>
@endsection