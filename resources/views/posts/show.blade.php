@extends('layouts.main')

@section('title', $post->title)

@section('content')

    <div class="row px-5 py-4">
        <div id="image-container" class="col-md-6">
            <img src="/img/posts/{{$post->image}}" class="img-fluid" alt="{{$post->title}}">
        </div>
        <div id="informacao" class="col-md-6">
            <h2>{{$post->title}}</h2>
            <p class="author">{{$postAuthor['name']}}</p>

            <div id="description">
                <p class="post-description">{{$post->description}}</p>
            </div>
        </div>
    </div>
    <div class="row px-5 py-4">
        <div class="col-md-12">
            <h5>Comentarios</h5>

            @auth
                <div class="form-group">
                {{ $errors->first('comment') }}
                    <form action="{{route('comment'),$post->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <textarea type="text" class="form-control" placeholder="Escrever um novo comentário" name="comment" id="content"></textarea>
                        <input type="submit" class="btn btn-primary my-3" value="Comentar">
                    </form>
                </div>
            @endauth
            <ul id="commentarios">
                @if($post->comments)
                    @forelse($post->comments as $comment)
                        <li>{{$comment->comment}}</li>
                    @empty
                        <li>Não tem nenhum comentário.</li>
                    @endforelse
                @else
                    <li>Não tem nenhum comentário.</li>
                @endif
            </ul>
        </div>
        
    </div>

@endsection