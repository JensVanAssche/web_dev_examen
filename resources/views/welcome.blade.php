@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-center main-title mb-5">Nutella's Grote Wedstrijd</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Met de code op het deksel van je Nutella pot kan je veel prijzen winnen! Waag nu je kans!</h4>
            <h4>Volgende winnaar wordt bekend gemaakt op:</h4>
        </div>
        <div class="col">
            <h2>Prijzen</h2>
            <p>prijzen hier</p>

            <h2>Winnaars</h2>
            <p>winnaars hier</p>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="/meedoen" class="btn btn-danger btn-lg">Deelnemen!</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="/images/jar.png" class="main-jar">
        </div>
    </div>
@endsection