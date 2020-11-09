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
            $table->unsignedBigInteger('crime_id');
            $table->string('nom');
            $table->string('prenom');
            $table->text('adresse');
            $table->string('pays');
            $table->string('ville');
            $table->enum('type', ['auteur', 'complice']);
            $table->integer('age');
            $table->enum('genre', ['masculin', 'feminin']);
            $table->string('education');
            $table->boolean('voyageur_international');
            $table->integer('Revenue');
            $table->string('nationalite');
            $table->string('travail');
            $table->text('affaire_judiciaire');
            $table->timestamps();


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
