@extends('layouts.master')
@section('content')
    <h1>Create</h1>
    @include('partials.navigation')
    <p></p>
    <form action="{{ route('create') }}" method="post">
        <div>
            <label>First name</label>
            <input type="text" name="first_name" id="first_name">
        </div>
        <div>
            <label>Last name</label>
            <input type="text" name="last_name" id="last_name">
        </div>
        {{ csrf_field() }}
        <button type="submit">Add</button>
    </form>
@endsection