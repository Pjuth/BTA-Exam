@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2>Redaguoti knygą</h2>
            <form action="{{ route('books.update', $book->id) }}" method="post" autocomplete="off">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Knygos pavadinimas:</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ (old('title') ? old('title') : $book->title) }}">
                </div>
                <div class="form-group">
                    <label for="pages">Puslapiai:</label>
                    <input type="number" class="form-control" id="pages" name="pages"
                           value="{{ (old('pages') ? old('pages') : $book->pages) }}">
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn"
                           value="{{ (old('isbn') ? old('isbn') : $book->isbn) }}">
                </div>
                <div class="form-group">
                    <label for="short_description">Trumpas aprašymas:</label>
                    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                    <script>tinymce.init({selector: 'textarea'});</script>
                    <div class="panel-body">
                        <textarea class="form-control" id="description"
                                  name="short_description">{{ (old('short_description') ? old('short_description') : $book->short_description) }}</textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="author_id">Autorius</label>
                    <select id="author_id" name="author_id" class="form-control">
                        <option value=""></option>
                        @foreach($authors as $author)
                            <option {{old('author_id') ? ($author->id == old('author_id') ? 'selected="selected"' : '') :
                        ($book->author['id'] == $author->id ? 'selected="selected"' : '')}} value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Atnaujinti</button>
        </div>
        @foreach($errors->all() as $error)
            <p style="background-color: red; width: fit-content; color: yellow;">{{$error}}</p>
        @endforeach

    </div>

@endsection