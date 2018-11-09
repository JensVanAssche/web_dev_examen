@extends('layouts.main')

@section('content')
    <img src="/images/jar.png" class="main-jar">
    <div class="row">
        <div class="col">
            <h1 class="text-center main-title mb-5">Nutella's Grote Wedstrijd</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <h4 class="mb-5">Met de code op het deksel van je Nutella pot kan je veel prijzen winnen! Waag nu je kans!</h4>
            <h4>Deze periode loopt</h4>
            <h4>van {{ $currentPeriod['start'] }} tot {{ $currentPeriod['end'] }}</h4>
        </div>
        <div class="col">
            <h2>Winnaars</h2>
            <div class="row">
                <div class="col">
                    <h4>Periode 1:</h4>
                    @if(count($winners[0]) == 0)
                        <p class="mb-2">Nog geen winnaars</p>
                    @else
                        @foreach($winners[0] as $winner)
                            <p class="mb-2">{{ $winner['firstname']}} {{ $winner['lastname']}}</p>
                        @endforeach
                    @endif
                    <h4>Periode 3:</h4>
                        @if(count($winners[2]) == 0)
                            <p class="mb-2">Nog geen winnaars</p>
                        @else
                            @foreach($winners[2] as $winner)
                                <p class="mb-2">{{ $winner['firstname']}} {{ $winner['lastname']}}</p>
                            @endforeach
                        @endif
                </div>
                <div class="col">
                    <h4>Periode 2:</h4>
                        @if(count($winners[1]) == 0)
                            <p class="mb-2">Nog geen winnaars</p>
                        @else
                            @foreach($winners[1] as $winner)
                                <p class="mb-2">{{ $winner['firstname']}} {{ $winner['lastname']}}</p>
                            @endforeach
                        @endif
                    
                    <h4>Periode 4:</h4>
                        @if(count($winners[3]) == 0)
                            <p class="mb-2">Nog geen winnaars</p>
                        @else
                            @foreach($winners[3] as $winner)
                                <p class="mb-2">{{ $winner['firstname']}} {{ $winner['lastname']}}</p>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="/meedoen" class="btn btn-danger btn-lg py-3 px-4">Deelnemen!</a>
        </div>
    </div>
@endsection