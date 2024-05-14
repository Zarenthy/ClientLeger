<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="resources/css/base.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f6f6f6;
        }
        .header-band {
            background-color: #6ea8fe;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-band nav a, .auth-links a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
        }
        main {
            min-height: 80vh;
            padding: 20px;
        }
        footer {
            background-color: #dcdcdc;
            text-align: center;
            padding: 10px 0;
        }
        .nav-link {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            /* Correction for the closing comment */
            font-size: 18px;
        }
        /* Additional styles for auth-links */
        .auth-links {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @yield('style')
    </style>
</head>
<body>
<header class="header-band">
    <nav>
        <a href="/accueil">Accueil</a>
        <a href="/employe">Employe</a>
        <a href="/client">Client</a>
        <a href="/visite/index">Rapport</a>
    </nav>
    <div class="auth-links">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Connexion</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Inscription</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>
<footer>
    <p>&copy; 2024 GSB Organisation</p>
</footer>
</body>
</html>
