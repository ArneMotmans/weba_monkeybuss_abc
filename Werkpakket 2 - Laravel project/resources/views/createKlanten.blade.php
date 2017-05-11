@extends('layouts.master')
@section('content')
    <h1>Maak klant aan</h1>
    @include('partials.navigationKlanten')
    <p></p>
    <form action="{{ route('createKlanten') }}" method="post">
        <div>
            <label>Voornaam</label>
            <input type="text" name="voornaam" id="voornaam">
        </div>
        <div>
            <label>Naam</label>
            <input type="text" name="naam" id="naam">
        </div>
        <div>
            <label>Postcode</label>
            <input type="text" name="postcode" id="postcode">
        </div>
        <div>
            <label>Gemeente</label>
            <input type="text" name="gemeente" id="gemeente">
        </div>
        <div>
            <label>Straat</label>
            <input type="text" name="straat" id="straat">
        </div>
        <div>
            <label>Huisnummer</label>
            <input type="text" name="huisnummer" id="huisnummer">
        </div>
        <div>
            <label>Telefoonnummer</label>
            <input type="text" name="telefoonnummer" id="telefoonnummer">
        </div>
        <div>
            <label>Gsm nummer</label>
            <input type="text" name="gsmNummer" id="gsmNummer">
        </div>
        <div>
            <label>E-mailadres</label>
            <input type="email" name="eMailadres" id="eMailadres">
        </div>
        <div>
            <label>Getekende Offerte</label>
            <input type="text" name="getekendeOfferte" id="getekendeOfferte">
        </div>
        <div>
            <label>Getekend Contract</label>
            <input type="text" name="getekendContract" id="getekendContract">
        </div>
        <div>
            <label>Project</label>
            <input type="text" name="project" id="project">
        </div>
        {{ csrf_field() }}
        <button type="submit">Add</button>
    </form>
@endsection