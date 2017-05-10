@extends('layouts.master')
@section('content')
    <h1>Wijzig Klant</h1>
    @include('partials.navigationKlanten')
    <p></p>
    <form action="{{ route('putKlanten') }}" method="post">
        <div>
            <label>Voornaam</label>
            <input type="text" name="voornaam" value="{{$klant->voornaam}}">
        </div>
        <div>
            <label>Naam</label>
            <input type="text" name="naam" value="{{$klant->naam}}">
        </div>
        <div>
            <label>Postcode</label>
            <input type="text" name="postcode" value="{{$klant->postcode}}">
        </div>
        <div>
            <label>Gemeente</label>
            <input type="text" name="gemeente" value="{{$klant->gemeente}}">
        </div>
        <div>
            <label>Straat</label>
            <input type="text" name="straat" value="{{$klant->straat}}">
        </div>
        <div>
            <label>Huisnummer</label>
            <input type="text" name="huisnummer" value="{{$klant->huisnummer}}">
        </div>
        <div>
            <label>Telefoonnummer</label>
            <input type="text" name="telefoonnummer" value="{{$klant->telefoonnummer}}">
        </div>
        <div>
            <label>Gsm nummer</label>
            <input type="text" name="gsmNummer" value="{{$klant->gsmNummer}}">
        </div>
        <div>
            <label>E-mailadres</label>
            <input type="email" name="eMailadres" value="{{$klant->eMailadres}}">
        </div>
        <div>
            <label>Getekende Offerte</label>
            <input type="text" name="getekendeOfferte" value="{{$klant->getekendeOfferte}}">
        </div>
        <div>
            <label>Getekend Contract</label>
            <input type="text" name="getekendContract" value="{{$klant->getekendContract}}">
        </div>
        <div>
            <label>Project</label>
            <input type="text" name="project" value="{{$klant->project}}">
        </div>
        <input type="hidden" name="id" value="{{$klant->id}}">
        {{ csrf_field() }}
        <button type="submit">Edit</button>
    </form>
@endsection