<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = new \App\Person([
            'first_name' => 'Jack',
            'last_name' => 'Bauer'
        ]);
        $person->save();

        $person = new \App\Person([
            'first_name' => 'Rick',
            'last_name' => 'Grimes'
        ]);
        $person->save();
    }
}
