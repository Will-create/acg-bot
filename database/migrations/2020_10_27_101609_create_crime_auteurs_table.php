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
            $table->uuid('uuid');
            $table->unsignedBigInteger('crime_id');
            $table->string('nom', 50);
            $table->string('prenom', 60);
            $table->text('adresse');
            $table->string('pays', 25);
            $table->string('ville', 25);
            $table->enum('type', ['auteur', 'complice']);
            $table->date('date_naiss');
            $table->enum('genre', ['masculin', 'feminin']);
            $table->boolean('education');
            $table->boolean('voyageur_international');
            $table->integer('revenue');
            $table->string('nationalite', 25);
            $table->string('travail', 100);
            $table->text('affaire_judiciaire');
            $table->timestam-ps();


            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
            ->onUpdate('restrict');
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
