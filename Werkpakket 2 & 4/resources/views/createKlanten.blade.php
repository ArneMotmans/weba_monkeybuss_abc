@extends('layouts.master')
@section('content')
    <h1 class="text-center">Maak klant aan</h1>

    <div class="col-md-12">
    <form action="{{ route('createKlanten') }}" method="post">
        <div class="col-md-6">
        <div class="form-group">
            <label>Voornaam</label>
            <input class="form-control" type="text" name="voornaam" id="voornaam">
        </div>
        <div class="form-group">
            <label>Naam</label>
            <input class="form-control" type="text" name="naam" id="naam">
        </div>
        <div class="form-group">
            <label>Postcode</label>
            <input class="form-control" type="text" name="postcode" id="postcode">
        </div>
        <div class="form-group">
            <label>Gemeente</label>
            <input class="form-control" type="text" name="gemeente" id="gemeente">
        </div>
        <div class="form-group">
            <label>Straat</label>
            <input class="form-control" type="text" name="straat" id="straat">
        </div>
        <div class="form-group">
            <label>Huisnummer</label>
            <input class="form-control" type="text" name="huisnummer" id="huisnummer">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Telefoonnummer</label>
            <input class="form-control" type="text" name="telefoonnummer" id="telefoonnummer">
        </div>
        <div class="form-group">
            <label>Gsm nummer</label>
            <input class="form-control" type="text" name="gsmNummer" id="gsmNummer">
        </div>
        <div class="form-group">
            <label>E-mailadres</label>
            <input class="form-control" type="email" name="eMailadres" id="eMailadres">
        </div>
        <div class="form-group">
            <label>Getekende Offerte</label>
            <input class="form-control" type="text" name="getekendeOfferte" id="getekendeOfferte">
        </div>
        <div class="form-group">
            <label>Getekend Contract</label>
            <input class="form-control" type="text" name="getekendContract" id="getekendContract">
        </div>
        <div class="form-group">
            <label>Project</label>
            <input class="form-control" type="text" name="project" id="project">
        </div>
        </div>
        {{ csrf_field() }}
        <div class="col-md-1 col-md-offset-11"><button class="btn btn-success" type="submit">Opslaan</button>
        </div>
    </form>
    </div>
@endsection