@extends('layoutbase.layoutBase')
@section('titulo','New Product')

@section('conteudo')

@if(session('aviso'))
<div class="alert alert-warning">
    {{ session('aviso') }} , <a href="{{ route('produto.index') }}">Voltar para tela inicial</a>
</div>
@endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="color: black;">Novo Produto</h1>
                <form method="post" action="{{ route('product.data') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Nome do produto" name="name" required>
                        <label for="name" style="color: black;">Nome do produto</label>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" style="color: black;" class="form-label">Selecione a foto do produto</label>
                        <input class="form-control" type="file" id="formFile" name="image" required>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" style="color: black;" class="form-control" id="price" placeholder="Valor do produto" name="price" required>
                        <label for="price">Valor do produto</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" style="color: black;" class="form-control" id="description" placeholder="Descrição do produto" name="description" required>
                        <label for="description">Descrição do produto</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" style="color: black;" class="form-control" id="estoque" placeholder="Quantidade em estoque" name="amount" required> 
                        <label for="estoque">Quantidade em estoque</label>
                    </div>



                      <div class="form-floating mb-3">
                        <button type="submit" class="btn btn-success">Salvar</button>

                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection