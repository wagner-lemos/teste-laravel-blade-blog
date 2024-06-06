@extends('layouts.main')

@section('title','Dashboard')

@section('content')

<div class="row px-5 py-4">

    <div class="col-md-12 pb-4 pt-3">
        <h4>Minhas postagens</h4>
    </div>
    <div class="col-md-12 dashboard-posts">
        @if(isset($posts) && count($posts) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="10%" scope="col">#</th>
                    <th width="70%" scope="col">Nome</th>
                    <th width="20%" scope="col">Ações</th>
                </tr>
            </thead>
        
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td scropt="row">{{$loop->index+1}}</td>
                <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                <td>
                <a href="/posts/edit/{{$post->id}}" class="btn btn-info edit-btn">Editar</a>
                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                </form>
                </td>
            
            </tr>
            @endforeach
        </tbody>
        </table>
        @else
        <p>Nenhuma postagem foi feita, <a href="/posts/create">deseja criar uma?</a></p>
        @endif
    </div>
</div>

@endsection
