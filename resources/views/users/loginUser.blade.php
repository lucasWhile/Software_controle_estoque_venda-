<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #fff;
        font-family: 'Arial', sans-serif;
      }
      .form-container {
        background-color: #ffffff;
        color: #333;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        padding: 40px;
        width: 100%;
        max-width: 400px;
        transition: all 0.5s ease;
      }
      .form-container h2 {
        font-weight: bold;
        color: #6a11cb;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 20px;
        text-align: center;
      }
      .form-container input {
        border-radius: 25px;
        padding: 10px 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
      }
      .form-container button {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        border: none;
        border-radius: 25px;
        color: #fff;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s;
      }
      .form-container button:hover {
        background: linear-gradient(135deg, #2575fc, #6a11cb);
      }
      .form-container .alert {
        border-radius: 10px;
      }
      footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 15px;
        font-size: 14px;
        position: absolute;
        bottom: 0;
        width: 100%;
      }
    </style>
  </head>
  <body class="d-flex justify-content-center align-items-center vh-100">

    <div class="form-container">
      <div class="text-center mb-4">
        <img src="{{ asset('logo/risco.png') }}" alt="Logo" width="50" height="50">
      </div>

      <h2>Login</h2>

      @if(session('aviso'))
      <div class="alert alert-warning text-center">
          {{ session('aviso') }}
      </div>
      @endif

      <form action="{{ route('user.auth') }}" method="GET">
        @csrf
        <div class="mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
    </div>

    <footer>
      <p>&copy; 2024 Controle Total. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      // Animação suave no carregamento
      window.addEventListener('load', function() {
        const formContainer = document.querySelector('.form-container');
        formContainer.style.opacity = '0';
        formContainer.style.transform = 'translateY(-20px)';
        setTimeout(() => {
          formContainer.style.opacity = '1';
          formContainer.style.transform = 'translateY(0)';
        }, 100);
      });
    </script>
  </body>
</html>
