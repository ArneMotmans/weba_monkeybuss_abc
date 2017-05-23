@extends('layouts.master')
@section('content')
    <div class="text-center"><h1>Alle klanten</h1>
    </div>
    <div class="col-md-12">
    <table border="1" id="tabel">
        <thead>
        <tr>
            <th>Id</th>
            <th>Voornaam</th>
            <th>Naam</th>
            <th>Postcode</th>
            <th>Gemeente</th>
            <th>Straat</th>
            <th>Huisnummer</th>
            <th>Telefoonnummer</th>
            <th>GsmNummer</th>
            <th>E-mailadres</th>
            <th>Getekende Offerte</th>
            <th>Getekend Contract</th>
            <th>Project</th>
            <th>Beheer</th>
        </tr>
        </thead>
    </div>
    @foreach($klanten as $klant)
            <tr>
                <td>{{$klant->id}}</td>
                <td>{{$klant->voornaam}}</td>
                <td>{{$klant->naam}}</td>
                <td>{{$klant->postcode}}</td>
                <td>{{$klant->gemeente}}</td>
                <td>{{$klant->straat}}</td>
                <td>{{$klant->huisnummer}}</td>
                <td>{{$klant->telefoonnummer}}</td>
                <td>{{$klant->gsmNummer}}</td>
                <td>{{$klant->eMailadres}}</td>
                <td>{{$klant->getekendeOfferte}}</td>
                <td>{{$klant->getekendContract}}</td>
                <td>{{$klant->project}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('editKlanten',$klant->id) }}">Wijzig</a>
                    <a class="btn btn-danger" href="{{ route('deleteKlanten',$klant->id) }}">Verwijder</a>
                </td>
            </tr>
    @endforeach
    </table>
    <script src="{{ asset('js/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/responsiveDatatable.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tabel').DataTable({
                responsive: true
            });
        });
    </script>
@endsection