@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-wrapper">
        <h2>Sukurti naują autorių</h2>
        <form action="{{ route('authors.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="name">Vardas:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="surname">Pavardė:</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Siųsti</button>
    </div>
    @foreach($errors->all() as $error)
        <p style="background-color: red; width: fit-content; color: yellow;">{{$error}}</p>
    @endforeach
</div>

@endsection
