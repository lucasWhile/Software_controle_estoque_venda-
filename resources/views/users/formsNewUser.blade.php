<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de novo funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .form-container {
        background-color: #e9ecef; /* Cor do fundo do card */
        opacity: 0; /* Começa invisível */
        transform: translateY(-20px); /* Movido para cima */
        transition: opacity 0.5s ease, transform 0.5s ease; /* Animação */
      }
      .show {
        opacity: 1; /* Torna visível */
        transform: translateY(0); /* Retorna à posição original */
      }
      footer {
        background-color: #34288d;
        color: white;
        text-align: center;
        padding: 20px;
        position: absolute;
        bottom: 0;
        width: 100%;
      }
    </style>
  </head>

  <body class="d-flex justify-content-center align-items-center vh-100 bg-light">


    <div class="card form-container" style="width: 400px; padding: 40px;">
      <h2 class="text-center mb-4">Cadastro</h2>
      @if(session('aviso'))
      <div class="alert alert-warning">
          {{ session('aviso') }}
      </div>
       @endif
      <form action="{{route('user.data')}}" method="GET">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" name="name" id="nome" placeholder="Nome" required>
        </div>
        <div class="mb-3">
          <input type="number" class="form-control" name="CPF" id="CPF" placeholder="CPF" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" id="senha" placeholder="Senha" required>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <label for="level" class="form-label">Nível</label>
          <select class="form-select" name="level" id="level" required>
            <option value="" disabled selected>Selecione um nível</option>
            <option value="funcionario">Funcionário</option>
            <option value="estagiario">Estagiário</option>
          </select>
        </div>
        <button class="btn btn-primary w-100">Adicionar Usuario</button>
        
      </form>


        <a class="btn btn-primary w-100" href="{{ route('produto.index') }}" style="margin-top: 5%">Voltar</a>

  

    </div>

    <footer>
      <p>&copy; 2024  Controle Total</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      // Adiciona a classe 'show' após 100ms para animar o card
      window.addEventListener('load', function() {
        const card = document.querySelector('.form-container');
        setTimeout(() => {
          card.classList.add('show');
        }, 100);
      });
    </script>
  </body>
</html>
