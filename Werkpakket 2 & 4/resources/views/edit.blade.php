@extends('layouts.master')
@section('content')
    <h1>Edit</h1>
    @include('partials.navigation')
    <p></p>
    <form action="{{ route('put') }}" method="post">
        <div>
            <label>First name</label>
            <input type="text" name="first_name" value="{{ $person->first_name }}">
        </div>
        <div>
            <label>Last name</label>
            <input type="text" name="last_name" value="{{ $person->last_name }}">
        </div>
        <input type="hidden" name="id" value="{{ $person->id }}">
        {{ csrf_field() }}
        <button type="submit">Edit</button>
    </form>
@endsection