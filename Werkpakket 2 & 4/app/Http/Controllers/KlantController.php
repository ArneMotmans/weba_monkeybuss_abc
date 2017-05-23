<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klant;

class KlantController extends Controller
{
    public function getKlantAll()
    {
        $klanten = Klant::all();
        return view('welcomeKlanten', ['klanten' => $klanten]);
    }

    public function getKlantAdd()
    {
        return view('createKlanten');
    }

    public function postKlantAdd(Request $request)
    {
        $this->validate($request, [
            'voornaam' => 'required|min:2',
            'naam' => 'required|min:2'
        ]);
        $klant = new Klant([
            'voornaam' => $request->input('voornaam'),
            'naam' => $request->input('naam'),
            'postcode' => $request->input('postcode'),
            'gemeente' => $request->input('gemeente'),
            'straat' => $request->input('straat'),
            'huisnummer' => $request->input('huisnummer'),
            'telefoonnummer' => $request->input('telefoonnummer'),
            'gsmNummer' => $request->input('gsmNummer'),
            'eMailadres' => $request->input('eMailadres'),
            'getekendeOfferte' => $request->input('getekendeOfferte'),
            'getekendContract' => $request->input('getekendContract'),
            'project' => $request->input('project')
        ]);
        $klant->save();
        return redirect()->route('welcomeKlanten');
    }

    public function getKlantEdit($id)
    {
        return view('editKlanten', ['klant' => Klant::find($id)]);
    }

    public function putKlantEdit(Request $request)
    {
        $this->validate($request, [
            'voornaam' => 'required|min:2',
            'naam' => 'required|min:2',
            'postcode' => 'required|min:2',
            'gemeente' => 'required|min:2',
            'straat' => 'required|min:2',
            'huisnummer' => 'required|min:2',
            'telefoonnummer' => 'required|min:2',
            'gsmNummer' => 'required|min:2',
            'eMailadres' => 'required|min:2',
            'getekendeOfferte' => 'required|min:2',
            'getekendContract' => 'required|min:2',
            'project' => 'required|min:2'
        ]);
        $klant = Klant::find($request->input('id'));
        $klant->voornaam = $request->input('voornaam');
        $klant->naam = $request->input('naam');
        $klant->postcode = $request->input('postcode');
        $klant->gemeente = $request->input('gemeente');
        $klant->straat = $request->input('straat');
        $klant->huisnummer = $request->input('huisnummer');
        $klant->telefoonnummer = $request->input('telefoonnummer');
        $klant->gsmNummer = $request->input('gsmNummer');
        $klant->eMailadres = $request->input('eMailadres');
        $klant->getekendeOfferte = $request->input('getekendeOfferte');
        $klant->getekendContract = $request->input('getekendContract');
        $klant->project = $request->input('project');
        $klant->save();
        return redirect()->route('welcomeKlanten');
    }

    public function getKlantDelete($id)
    {
        $klant = Klant::find($id);
        $klant->delete();
        return redirect()->route('welcomeKlanten');
    }
}
