@extends('layouts.master')

@section('content')

    <div class="blog-post" style="margin-bottom:10px">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by 
            <a href="{{ route('user.posts.show', $post->user) }}">{{ $post->user->name }}</a>
        </p>
        <p>{{ $post->body }}</p>
    </div>

    @if (count($post->tags))
        <section class="mb-3">
            <h6 class="d-inline">Tags:</h6>
            @foreach ($post->tags as $tag)
                <a href="{{ route('tags.index', $tag) }}" class="badge badge-primary">{{ $tag->name }}</a>
            @endforeach
        </section>
    @endif
    
    <div class="mb-5">
        @if ($post->user_id == auth()->user()->id)
            <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
                <div class="float-right">
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-info">Uredi</a>
                    <button type="submit" class="btn btn-danger">Obriši</button>
                </div>
            </form>
        @endif      
        <a class="btn btn-primary" href="{{ route('posts.index') }}">Natrag</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('comments.store', $post) }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="body">Komentar</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" cols="30"></textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Komentiraj</button>
                </div>
            </form>
        </div>
    </div>

    @if(count($post->comments))
    <br>
    <div class="comments">
        <h4>Komentari:</h4>
        <ul class="list-group">
            @foreach ($post->comments as $comment)
            <li class="list-group-item">
                <b>{{ $comment->user->name }}</b>
                <i>{{ $comment->created_at->diffForHumans() }}</i>
                <p>{{ $comment->body }}</p>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <br>
    <p>Budi prvi koji će komentirati ovaj post!!!</p>
    @endif
    <br>    

@endsection