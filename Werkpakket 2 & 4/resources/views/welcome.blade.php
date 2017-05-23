@extends('layouts.app')
@section('content')
    <h1>All people</h1>
    <a href="{{ route('create') }}">Add person</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
        </tr>
        <p></p>
    @foreach($people as $person)
            <tr>
                <td>{{$person->id}}</td>
                <td>{{$person->first_name}}</td>
                <td>{{$person->last_name}}</td>
                <td>
                    <a href="{{ route('edit',$person->id) }}">Edit</a>
                    <a href="{{ route('delete',$person->id) }}">Delete</a>
                </td>
            </tr>
    @endforeach
    </table>
@endsection