@extends('layoutbase.layoutBase')
@section('titulo','Lista de Produtos')

@if(session('aviso'))
<div class="alert alert-warning text-center">
    {{ session('aviso') }} , <a href="{{ route('produto.index') }}" class="text-decoration-none">Voltar para tela inicial</a>
</div>
@endif

@section('conteudo')
<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->name }}</td>
                    <td>R$ {{ number_format($produto->price, 2, ',', '.') }}</td>
                    <td>{{ $produto->amount }}</td>
                    <td><a href="{{ route('search.product', $produto->id) }}" class="btn btn-success btn-sm">Editar</a></td>
                    <td><a href="{{ route('drop.product', $produto->id) }}" class="btn btn-danger btn-sm">Excluir</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
