<?php

use Illuminate\Database\Seeder;

class KlantenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $klant = new \App\Klant([
            'voornaam' => 'Jack',
            'naam' => 'Bauer',
            'postcode' => '3500',
            'gemeente' => 'Hasselt',
            'straat' => 'Vilderstraat',
            'huisnummer' => '55',
            'telefoonnummer' => '089584012464',
            'gsmNummer' => '047574712507',
            'eMailadres' => 'jack.bauer@gmail.com',
            'getekendeOfferte' => 'Nee',
            'getekendContract' => 'Ook niet',
            'project' => 'Vliegende Pastoors'
        ]);
        $klant->save();

        $klant = new \App\Klant([
            'voornaam' => 'Rick',
            'naam' => 'Grimes',
            'postcode' => '3500',
            'gemeente' => 'Hasselt',
            'straat' => 'Kapelstraat',
            'huisnummer' => '521',
            'telefoonnummer' => '08958455555',
            'gsmNummer' => '04757545673',
            'eMailadres' => 'rick.grimes@hotmail.com',
            'getekendeOfferte' => 'Nee',
            'getekendContract' => 'Ja',
            'project' => 'Zwevende Pastoors'
        ]);
        $klant->save();
    }
}
