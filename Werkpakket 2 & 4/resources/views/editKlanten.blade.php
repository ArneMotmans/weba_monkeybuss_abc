@extends('layouts.master')
@section('content')
    <h1 class="text-center">Wijzig klant</h1>

    <div class="col-md-12">
    <form action="{{ route('putKlanten') }}" method="post">
        <div class="col-md-6">
        <div class="form-group">
            <label>Voornaam</label>
            <input class="form-control" type="text" name="voornaam" value="{{$klant->voornaam}}">
        </div>
        <div class="form-group">
            <label>Naam</label>
            <input class="form-control" type="text" name="naam" value="{{$klant->naam}}">
        </div>
        <div class="form-group">
            <label>Postcode</label>
            <input class="form-control" type="text" name="postcode" value="{{$klant->postcode}}">
        </div>
        <div class="form-group">
            <label>Gemeente</label>
            <input class="form-control" type="text" name="gemeente" value="{{$klant->gemeente}}">
        </div>
        <div class="form-group">
            <label>Straat</label>
            <input class="form-control" type="text" name="straat" value="{{$klant->straat}}">
        </div>
        <div class="form-group">
            <label>Huisnummer</label>
            <input class="form-control" type="text" name="huisnummer" value="{{$klant->huisnummer}}">
        </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
            <label>Telefoonnummer</label>
            <input class="form-control" type="text" name="telefoonnummer" value="{{$klant->telefoonnummer}}">
        </div>
        <div class="form-group">
            <label>Gsm nummer</label>
            <input class="form-control" type="text" name="gsmNummer" value="{{$klant->gsmNummer}}">
        </div>
        <div class="form-group">
            <label>E-mailadres</label>
            <input class="form-control" type="email" name="eMailadres" value="{{$klant->eMailadres}}">
        </div>
        <div class="form-group">
            <label>Getekende Offerte</label>
            <input class="form-control" type="text" name="getekendeOfferte" value="{{$klant->getekendeOfferte}}">
        </div>
        <div class="form-group">
            <label>Getekend Contract</label>
            <input class="form-control" type="text" name="getekendContract" value="{{$klant->getekendContract}}">
        </div>
        <div class="form-group">
            <label>Project</label>
            <input class="form-control" type="text" name="project" value="{{$klant->project}}">
        </div>
        </div>
        <input type="hidden" name="id" value="{{$klant->id}}">
        {{ csrf_field() }}
        <div class="col-md-1 col-md-offset-11">
        <button class="btn btn-info" type="submit">Wijzigingen opslaan</button>
        </div>
    </form>
    </div>
@endsection