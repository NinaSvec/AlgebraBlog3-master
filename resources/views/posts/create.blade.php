@extends('layouts.master')

@section('content')
    
    <div>
        <div>
            <h3>Kreiraj novu objavu</h3>
        </div>

        <hr>

        <div>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="title">Naslov</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">Objava</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" cols="80" rows="10">{{ old('body') }}</textarea>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <h6>Oznake</h6>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addTag">
                        Dodaj oznaku
                    </button>
                    @foreach ($tags as $tag)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input @error('tags') is-invalid @enderror"
                            name="tags[]" id="tags-{{ $tag->id }}" value="{{ $tag->id }}">
                            <label for="tags-{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <a href="{{ route('posts.index') }}" class="btn btn-info">Odustani</a>
                    <button type="submit" class="btn btn-primary" style="float:right">Objavi</button>
                </div>
            </form>
        </div>
    </div>

    @include('tags.modal')

@endsection