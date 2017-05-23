<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public function getPersonAll(){
        $people = Person::all();
        return view('welcome', ['people' => $people]);
    }

    public function getPersonAdd(){
        return view('create');
    }

    public function postPersonAdd(Request $request){
        $this->validate($request,[
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2'
        ]);
        $person = new Person([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name')
        ]);
        $person->save();
        return redirect()->route('welcome');
    }

    public function getPersonEdit($id){
        return view('edit', ['person' => Person::find($id)]);
    }

    public function putPersonEdit(Request $request){
        $this->validate($request,[
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2'
        ]);
        $person = Person::find($request->input('id'));
        $person->first_name = $request->input('first_name');
        $person->last_name = $request->input('last_name');
        $person->save();
        return redirect()->route('welcome');
    }

    public function getPersonDelete($id){
        $person = Person::find($id);
        $person->delete();
        return redirect()->route('welcome');
    }
}
