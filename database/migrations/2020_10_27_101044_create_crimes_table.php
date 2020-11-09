<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->foreignId('nature_crime_id');
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->string('espece')->nullable();

            $table->unsignedBigInteger('pays_appréhension')->nullable();
            $table->unsignedBigInteger('pays_destination')->nullable();
            $table->unsignedBigInteger('pays_origine_produit')->nullable();
            $table->unsignedBigInteger('unite_id')->nullable();;
            $table->unsignedBigInteger('services_Investigateurs');
            $table->date('date_apprehension')->nullable();
            $table->string('arme_utilise')->nullable();
            $table->string('localite_aprrehension')->nullable();
            $table->string('longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('dure_emprisonnment')->nullable();
            $table->text('gestion_des_saisis')->nullable();
            $table->string('penalite')->nullable();
            $table->string('intention')->nullable();
            $table->integer('Quantite_saisie')->nullable();
            $table->integer('Nombre_complice')->nullable();
            $table->boolean('veto')->nullable();
            $table->boolean('lien_terrorisme')->default(false);
            $table->string('victime')->nullable();
            $table->unsignedBigInteger('aire_protegee_id');
            $table->timestamps();



            $table->foreign('nature_crime_id')->references('id')->on('crime_natures')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_appréhension')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_destination')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_origine_produit')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('unite_id')->references('id')->on('unites')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('services_Investigateurs')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.es
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crimes');
    }
}
