@extends('layouts.main')

@section('title','Criar Postagem')

@section('content')

<div class="row px-5 py-4">

    <div class="col-md-12 pb-4 pt-3">
        <h3>Adicionar</h3>
    </div>

    <div class="col-md-12 form-editar">
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="col-md-12">
                    <label for="image">Imagem:</label>
                    <input type="file" class="form-control-file" id="image" name="image" required />
                </div>
                <div class="col-md-12 my-3">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título da postagem">
                </div>
                <div class="col-md-12">
                    <label for="title">Descrição:</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Descrição da postagem"></textarea>
                
                    <input type="submit" class="btn btn-primary my-3" value="Adicionar">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection