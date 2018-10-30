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
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @endif
                    <h1 class="mb-3">Vul uw <span class="color-red">Nutella</span> code in!</h1>
                    <p>Let op: Uw code moet uniek en 8 karakters lang zijn</p>
                    <input type="text" name="code" class="form-control mb-3">
                    <hr />
                    <h2 class="color-red mb-3">Uw gegevens invullen</h2>
                    <div class="form-row">
                        <div class="col">
                            <label>Voornaam</label>
                            <input type="text" name="firstname" class="form-control mb-3">
                        </div>
                        <div class="col">
                            <label>Familienaam</label>
                            <input type="text" name="lastname" class="form-control mb-3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label>Adres</label>
                            <input type="text" name="adress" class="form-control mb-3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label>Stad</label>
                            <input type="text" name="city" class="form-control mb-3">
                        </div>
                        <div class="col">
                            <label>Postcode</label>
                            <input type="text" name="zip" class="form-control mb-3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control mb-3">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg">Ga verder</button>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection