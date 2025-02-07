@extends('layoutbase.layoutBase')
@section('titulo','Editar produto')
@section('conteudo')
    

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Novo Produto</h1>
            <form method="post" action="{{ route('save.edit.product',$produto->id) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Nome do produto" name="name" value="{{ $produto->name }}" required>
                    <label for="name">Nome do produto</label>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Selecione a foto do produto</label>
                    <input class="form-control" type="file" id="formFile" name="image" required>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" placeholder="Valor do produto" value="{{ $produto->price }}" name="price" required>
                    <label for="price">Valor do produto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" placeholder="Descrição do produto" name="description" value="{{ $produto->description }}" required>
                    <label for="description">Descrição do produto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="estoque" placeholder="Quantidade em estoque" name="amount"  value="{{ $produto->amount }}" required> 
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