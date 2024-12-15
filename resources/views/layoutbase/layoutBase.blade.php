<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        footer {
            background-color: #3D2DB5;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container {
            margin-top: 20px;
        }
        footer p {
            margin: 0;
        }
    </style>

    <nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: #3D2DB5;">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="{{ route('produto.index') }}">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav text-light">
              @if( Auth::user()->level == 'dono')
              <a class="nav-link" href="{{ route('create.user') }}">Cadastrar Novo Colaborador</a>
              <a class="nav-link" href="{{ route('list.user') }}">Listar Usuários</a>
              @endif

              @if( Auth::user()->level == 'dono')
              <a class="nav-link" href="{{ route('create.product') }}">Novo Produto</a>
              @endif

              @auth
                <a class="nav-link" href="{{ route('user.myperfil') }}">Meu Perfil</a>
                <a class="nav-link" href="{{ route('user.logout') }}">Sair</a>
              @endauth
            </div>
          </div>
        </div>
      </nav>

      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{asset('logo/risco.png')}}" alt="Logo" width="45" height="45" class="d-inline-block align-text-top">
            <span style="font-weight: bold; color: #3D2DB5;">Controle Total</span>
          </a>
        </div>
      </nav>

      <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('conteudo')
            </div>
        </div>
      </div>

      <footer>
        <p>&copy; 2024 Controle Total.</p>
        <p>Email: Controle_Total@gmail.com</p>
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
