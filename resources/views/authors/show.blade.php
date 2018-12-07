@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table thead-dark" style=" width: 800px; text-align: center;">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Pavadinimas</th>
                <th scope="col">Aprašymas</th>
            </tr>
            </thead>
            <tbody>


            <tr>
                <td>{{$lecture->id}}</td>
                <td>{{$lecture->name}}</td>
                <td>{!!$lecture->description!!}</td>
            </tr>

            </tbody>
        </table>

    </div>

@endsection
