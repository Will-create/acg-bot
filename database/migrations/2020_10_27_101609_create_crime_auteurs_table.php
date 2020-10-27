<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeAuteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_auteurs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->foreignId('crime_id');
            $table->string('nom_complet');
            $table->string('nationalite');
            $table->integer('age');
            $table->string('travail');
            $table->boolean('alphabetise');
            $table->text('affaire_judiciaire');
            $table->enum('genre', ['masculin', 'feminin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crime_auteurs');
    }
}
