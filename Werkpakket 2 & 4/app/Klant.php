<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    protected $table = 'klanten';
    protected $fillable = ['naam','voornaam','postcode', 'gemeente', 'straat', 'huisnummer', 'telefoonnummer','gsmNummer','eMailadres', 'getekendeOfferte', 'getekendContract', 'project'];
}
