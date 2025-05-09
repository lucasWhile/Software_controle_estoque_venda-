@extends('layoutbase.layoutBase')
@section('titulo', 'Bem-vindo ao sistema')

@section('conteudo')
<div class="container my-4">
    <h1 class="text-center">Bem-vindo 
        @auth 
       , {{ Auth::user()->name }}
        @endAuth
    </h1>
    @if(session('aviso'))
        <div class="alert alert-warning mt-3">
            {{ session('aviso') }}
        </div>
    @endif

    <div class="row mt-4">
        @forelse ($produtos as $produto)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $produto->image) }}" class="card-img-top" alt="Imagem de {{ $produto->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produto->name }}</h5>
                        <p class="card-text">{{ $produto->description }}</p>
                        <div class="mt-auto">
                            <div class="alert alert-success p-2" role="alert">
                                <strong>Preço:</strong> R$ {{ number_format($produto->price, 2, ',', '.') }}
                            </div>
                            <div class="alert alert-info p-2" role="alert">
                                <strong>Estoque:</strong> {{ $produto->amount }}
                                @auth
                                @if($produto->amount <=5 ) 

                                <div class="alert alert-danger mt-3">
                                   Aviso:Estoque baixo
                                </div>
                                
                                @endif
                                @endauth
                            </div>

                            @if(Auth::user())
                            <a href="{{ route('register.sale', $produto->id) }}" class="btn btn-primary w-100 mt-2">Registrar Venda</a>

                            @else
                            <a href="https://wa.me/{{ urlencode($produto->user->telefone) }}?text=Tenho%20interesse%20em%20comprar%20o%20produto%20{{ urlencode($produto->name) }}" class="btn btn-primary w-100 mt-2" target="_blank">
                                Tenho interesse em comprar
                            </a>
                            
                            
                            
                            @endif
                                  
         
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Nenhum produto disponível no momento.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
