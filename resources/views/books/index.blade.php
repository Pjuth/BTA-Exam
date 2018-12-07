@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center">Knygos</h1>
                <div style="margin-top: 10px; margin-bottom: 10px; display: inline-block;">
                    <a href="{{ route('books.create') }}" class="btn btn-primary active">Pridėti knygą</a>
                </div>
                <div style="display: inline-block">
                    <form action="{{route('books.index')}}" method="get" style="width: 250px; margin-left: 20px;">
                        <div class="form-group" style="display: inline-block; width: 150px;">
                            <select name="author_id" class="form-control">
                                <option value=""></option>
                                @foreach($authors as $author)
                                    <option {{old('author_id') ? ($author->id == old('author_id') ? 'selected="selected"' : '') :
                        ($request['author_id'] == $author->id ? 'selected="selected"' : '')}} value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtruoti</button>
                    </form>
                </div>
                <table class="table thead-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pavadinimas</th>
                        <th scope="col">Puslapiai</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Trumpas aprašymas</th>
                        <th scope="col">Autorius</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->pages}}</td>
                            <td>{{$book->isbn}}</td>
                            <td>{!!$book->short_description!!}</td>
                            <td>{{$book->author['name']}} {{$book->author['surname']}}</td>
                            {{--<td><a href="{{route('books.show',$book->id)}}" class="btn btn-info">Plačiau</a></td>--}}
                            <td><a href="{{route('books.edit',$book->id)}}" class="btn btn-success">Redaguoti</a></td>
                            <td>
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Trinti</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection