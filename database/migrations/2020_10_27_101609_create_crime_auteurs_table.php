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
            $table->integer('revenue');
            $table->unsignedBigInteger('localite_id')->nullable();
            $table->unsignedBigInteger('crime_id')->nullable();
            $table->unsignedBigInteger('pays_id')->nullable();
            $table->string('nom', 50);
            $table->string('prenom', 60);
            $table->string('nationalite', 25);
            $table->string('travail', 100);
            $table->string('tel', 60)->nullable();
            $table->text('affaire_judiciaire');
            $table->text('adresse');
            $table->enum('genre', ['masculin', 'feminin']);
            $table->enum('type', ['auteur', 'complice']);
            $table->date('date_naiss');
            $table->boolean('voyageur_international');
            $table->boolean('education');
            $table->timestamps();
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('localite_id')->references('id')->on('localites')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')->onUpdate('restrict');
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
