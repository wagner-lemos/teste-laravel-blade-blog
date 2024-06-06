@extends('layouts.main')

@section('title','DoutBlog')

@section('content')


<div id="search-container" class="row">
    <div class="col-md-12">
        <h3>Pesquisar</h3>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Titulo da postagem">
        </form>
    </div>
</div>

<div class="row">
    <div id="posts-container" class="col-md-12">
        @if($search)
        <h4>Pesquisar por: {{$search}}</h4>
        @else
        <h4>Postagens</h4>
        @endif
        <div id="cards-container" class="row">
        @foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
            <div class="previa">
                <img src="/img/posts/{{$post->image}}" alt="{{$post->title}}">
                <div class="card-detalhes">
                    <p class="card-data">{{$post->updated_at}}</p>
                    <h5 class="card-titulo">{{$post->title}}</h5>
                    <a href="/posts/{{$post->id}}" class="btn btn-outline-primary d-grid py-1">Ler mais</a>
                </div>
            </div>
        </div>
        @endforeach
        @if(count($posts) == 0 && $search)
        <p>Nenhuma postagem foi encontrada!</p>
        @elseif(count($posts) == 0)
        <p>Nenhuma postagem foi feita.</p>
        @endif
        </div>
    </div>
</div>
@endsection