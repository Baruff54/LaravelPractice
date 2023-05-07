<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ Route('accueil') }}">AppartSelling</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Mes biens</a>
              </li>
              @if (Auth::user()->isAdmin)
                <li class="nav-item">
                  <a class="nav-link" href="#">Administration</a>
                </li>
              @endif
            </ul>
                Bonjour {{ Auth::user()->prenom }}
                <form action="{{ route('logout') }}" method="post">
                  @csrf

                  <button name="logout" class="btn btn-danger">Se déconnecter</button>
                </form>
            @endauth
            @guest
                </ul>
                <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
            @endguest
          </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>