@extends('layoutbase.layoutBase')
@section('titulo','Listar Usuários')
@section('conteudo')

@if(session('aviso'))
<div class="alert alert-warning text-center">
    {{ session('aviso') }} 
</div>
@endif

<div class="table-responsive">
  <table class="table table-hover align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Cargo Atual</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
         @foreach ( $Users as $user )

         @if($user->id != Auth::user()->id)
         <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->CPF }}</td>

          <td>
              <form action="{{ route('change.level.user') }}" method="get" class="d-flex justify-content-center align-items-center">
                  @csrf
                  <select class="form-select form-select-sm w-50 me-2" name="level" aria-label="Alterar Cargo">
                      <option selected>{{ $user->level }}</option>
                      <option value="dono">Dono</option>
                      <option value="funcionario">Funcionário</option>
                      <option value="estagiario">Estagiário</option>
                  </select>

                  <input type="hidden" name="id" value="{{ $user->id }}">

                  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
              </form>
          </td>

          <td>
              <a href="{{ route('delete.user', $user->id) }}" class="btn btn-danger btn-sm">Demitir</a>
          </td>
        </tr>
        @endif

         @endforeach
      </tbody>
    </table>
</div>

@endsection
