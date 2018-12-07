@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-wrapper">
            <h2>Redaguoti knygą</h2>
            <form action="{{ route('authors.update', $author->id) }}" method="post" autocomplete="off">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Vardas:</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ (old('name') ? old('name') : $author->name) }}">
                </div>
                <div class="form-group">
                    <label for="surname">Pavardė:</label>
                    <input type="text" class="form-control" id="surname" name="surname"
                           value="{{ (old('surname') ? old('surname') : $author->surname) }}">
                </div>
                <button type="submit" class="btn btn-primary">Atnaujinti</button>
        </div>
        @foreach($errors->all() as $error)
            <p style="background-color: red; width: fit-content; color: yellow;">{{$error}}</p>
        @endforeach

    </div>

@endsection