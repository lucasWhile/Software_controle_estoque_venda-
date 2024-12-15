@extends('layoutbase.layoutBase')
@section('titulo','Lista de produtos')
@if(session('aviso'))
<div class="alert alert-warning">
    {{ session('aviso') }} , <a href="{{ route('produto.index') }}">Voltar para tela inicial</a>
</div>
@endif

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>


                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as  $produto)
                        <tr>
                            <th scope="row">{{ $produto->id }}</th>
                            <td>{{ $produto->name }}</td>

                            <td>{{ $produto->price }}</td>
                            <td>{{ $produto->amount }}</td>
                            <td> <button type="button" class="btn btn-success">Danger</button></td>

                            <td> <a href="{{ route('drop.product',$produto->id) }}" class="btn btn-danger">Excluir</a></td>

         
                          </tr>
                            
                        @endforeach
                  
                   
                    </tbody>
                  </table>
                
            </div>
        </div>
    </div>
@endsection