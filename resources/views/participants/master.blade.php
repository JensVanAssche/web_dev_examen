<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Participants CRUD</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .master {
            padding-top: 40px;
        }
        h5 { margin: 0; }
        table { width: 100%; }
        table th, table td { padding: 5px; }
        .add-contact-btn { float: right; }
        .alert p { margin-bottom: 0; }
        .admin-nav { background-color: #d90210; }
        .admin-nav p, .admin-nav a { color: #fff; }
    </style>
</head>
<body>
    <div class="admin-nav d-flex justify-content-between p-3">
        <div>
            <p>Logged in as admin</p>
        </div>
        <div>
            <a href="/dashboard">Dashboard</a>
            <div>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="container master">
        @yield('content')
    </div>
</body>
</html>
