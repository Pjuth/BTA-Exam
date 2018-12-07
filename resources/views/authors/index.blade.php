@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center">Autoriai</h1>
                <div style="margin-top: 10px; margin-bottom: 10px">
                    <a href="{{ route('authors.create') }}" class="btn btn-primary active">Pridėti autorių</a>
                </div>
                <table class="table thead-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Vardas</th>
                        <th scope="col">Pavardė</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($authors as $author)
                        <tr>
                            <td>{{$author->id}}</td>
                            <td>{{$author->name}}</td>
                            <td>{{$author->surname}}</td>
                            {{--                        <td><a href="{{route('authors.show',$author->id)}}" class="btn btn-info">Plačiau</a></td>--}}
                            <td><a href="{{route('authors.edit',$author->id)}}" class="btn btn-success">Redaguoti</a>
                            </td>
                            <td>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="post">
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
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection