<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlantenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klanten', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('naam');
            $table->string('voornaam');
            $table->string('postcode');
            $table->string('gemeente');
            $table->string('straat');
            $table->string('huisnummer');
            $table->string('telefoonnummer');
            $table->string('gsmNummer');
            $table->string('eMailadres');
            $table->string('getekendeOfferte');
            $table->string('getekendContract');
            $table->string('project');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klanten');
    }
}
