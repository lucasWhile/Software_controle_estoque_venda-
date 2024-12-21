@extends('layoutbase.layoutBase')
@section('titulo','Meu Perfil')

@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Meu Perfil</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-end font-weight-bold">
                            <span>Nome:</span>
                        </div>
                        <div class="col-md-8">
                            <span>{{ $user->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end font-weight-bold">
                            <span>Cargo:</span>
                        </div>
                        <div class="col-md-8">
                            <span>{{ $user->level }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-end font-weight-bold">
                            <span>Comissão:</span>
                        </div>
                        @if( Auth::user()->level == 'dono')
                        <div class="col-md-8">
                            <span>Função não disponivel</span>
                        </div>  
                        @else
                        <div class="col-md-8">
                            <span>R$ {{ number_format($user->commision->value_commission, 2, ',', '.') }}</span>
                        </div>
                        @endif
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
