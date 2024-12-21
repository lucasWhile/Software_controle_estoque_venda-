@extends('layoutbase.layoutBase')
@section('titulo','Editar Produto')
@section('conteudo')

@if(session('aviso'))
<div class="alert alert-warning text-center">
    {{ session('aviso') }} , <a href="{{ route('produto.index') }}" class="text-decoration-none">Voltar para tela inicial</a>
</div>
@endif

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4 text-center">Editar Produto</h1>
            <form method="POST" action="{{ route('save.edit.product') }}" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Nome do produto" name="name" value="{{ $produto->name }}" required>
                    <label for="name">Nome do produto</label>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Selecione a foto do produto</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <div id="imagePreview" class="text-center" style="margin-top: 10px;">
                  @if(!empty($produto->image))
                    <img src="{{ asset('storage/' . $produto->image) }}" name="image" alt="Imagem Atual" style="max-width: 200px; border: 1px solid #ccc; margin-top: 10px;">
                  @endif
                </div>

                <input type="hidden" id="id" name="id" value="{{ $produto->id }}">

                <script>
                    document.getElementById('formFile').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        const imagePreview = document.getElementById('imagePreview');

                        imagePreview.innerHTML = '';

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.alt = "Prévia da imagem";
                                img.style.maxWidth = "200px";
                                img.style.border = "1px solid #ccc";
                                img.style.marginTop = "10px";
                                imagePreview.appendChild(img);
                            };

                            reader.readAsDataURL(file);
                        }
                    });
                </script>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" placeholder="Valor do produto" name="price" value="{{ $produto->price }}" required>
                    <label for="price">Valor do produto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" placeholder="Descrição do produto" name="description" value="{{ $produto->description }}">
                    <label for="description">Descrição do produto</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="estoque" placeholder="Quantidade em estoque" name="amount" value="{{ $produto->amount }}" required>
                    <label for="estoque">Quantidade em estoque</label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Salvar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
