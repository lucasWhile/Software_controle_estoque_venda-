@extends('layoutbase.layoutBase')
@section('titulo','Lista de produtos')

@section('conteudo')
    <div class="container">
        @if(session('aviso'))
        <div class="alert alert-warning mt-3">
            {{ session('aviso') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Apagar</th>

                      </tr>
                    </thead>
                    @foreach ($produtos as $produto)
                    <tbody>
                      <tr>
                        <th scope="row"> {{  $produto->id }}</th>
                        <td>{{  $produto->name }}</td>
                        <td>{{  $produto->price }}</td>

                        <td>{{  $produto->amount }}</td>
                        <td><a href="{{ route('edit.product', $produto->id) }}" class="btn btn-success">Editar</a></td>
                        <td><a href="{{ route('drop.product', $produto->id) }}" class="btn btn-danger">Apagar</a></td>
                    

                      </tr>
                    </tbody>
                    @endforeach
                  </table>


                
                
            </div>
        </div>
    </div>
@endsection