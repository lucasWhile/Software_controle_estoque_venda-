@extends('layoutbase.layoutBase')
@section('titulo','Listar Usuarios')
@section('conteudo')



@if(session('aviso'))
<div class="alert alert-warning">
    {{ session('aviso') }} 
</div>
@endif


<table class="table">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">CPF</th>

        <th scope="col">Cargo Atual</th>
        <th scope="col">Demitir</th>


      </tr>
    </thead>
    <tbody>
       @foreach ( $Users as $user )

       @if($user->id==Auth::user()->id)

       @else
       <tr>
        <th scope="row">{{ $user->name }}</th>
        <td>{{ $user->CPF }}</td>
      

        <td>
            <div class="row">
                <form action="{{ route('change.level.user') }}" method="get">
                @csrf
                <div class="col-6">
                    <select class="form-select form-select-sm" name="level" aria-label="Small select example">
                        <option selected>{{ $user->level }}</option>
                        <option value="dono">Dono</option>
                        <option value="funcionario">Funcionario</option>
                        <option value="estagiario">Estagiario</option>
                    </select>            
                </div>

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="col-6">
                    <button type="submit"  class="btn btn-success">Salvar</button>
                </div>

                 </form>
            </div>
            
        </td>

        <td>
        <a> <a type="button" href="{{ route('delete.user',$user->id) }}" class="btn btn-danger">Demitir</a> </a>
        </td>
      </tr>
           
      @endif
       @endforeach

   
   
    </tbody>
  </table>





    
@endsection
