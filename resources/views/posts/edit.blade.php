@extends('layouts.main')

@section('title','Editando: '.$post->title)

@section('content')

<div class="row px-5 py-4">

    <div class="col-md-12 pb-4 pt-3">
        <h3>Editar: {{$post->title}}</h3>
    </div>

    <div class="col-md-12 form-editar">
        <form action="/posts/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="col-md-12">
                    <label for="image">Imagem:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <img src="/img/posts/{{$post->image}}" alt="{{$post->title}}" class="img-preview">
                </div>
                <div class="col-md-12 my-3">
                    <label for="title">Título:</label>
                    <input type="text" class="form-control" name="title" placeholder="Título da postagem" value="{{$post->title}}">
                </div>
                <div class="col-md-12">
                    <label for="title">Descrição:</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Descrição da postagem">{{$post->description}}</textarea>
            
                    <input type="submit" class="btn btn-primary my-3" value="Editar">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection