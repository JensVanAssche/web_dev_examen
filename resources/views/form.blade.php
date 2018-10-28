@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card p-4">
                <a href="/" class="color-black mb-3">terug</a>
                <form method="POST" action="{{ url('/meedoen') }}">
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1 class="mb-3">Vul uw <span class="color-red">Nutella</span> code in!</h1>
                    <p>Let op: Uw code moet uniek en 8 karakters lang zijn</p>
                    <input type="text" name="code" placeholder="Nutella Code" class="form-control mb-3">
                    <hr />
                    <h2 class="color-red mb-3">Uw gegevens invullen</h2>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="firstname" placeholder="Voornaam" class="form-control mb-3">
                        </div>
                        <div class="col">
                            <input type="text" name="lastname" placeholder="Familienaam" class="form-control mb-3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="adress" placeholder="Adres" class="form-control mb-3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="city" placeholder="Stad" class="form-control mb-3">
                        </div>
                        <div class="col">
                            <input type="number" name="zip" placeholder="Postcode" class="form-control mb-3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="email" name="email" placeholder="E-mail" class="form-control mb-3">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg">Ga verder</button>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection