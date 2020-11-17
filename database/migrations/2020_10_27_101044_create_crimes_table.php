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
            $table->uuid('uuid');
            $table->foreignId('nature_crime_id');
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->unsignedBigInteger('condition_produit_id');
            $table->unsignedBigInteger('pays_apprehension')->nullable();
            $table->unsignedBigInteger('pays_destination')->nullable();
            $table->unsignedBigInteger('pays_origine_produit')->nullable();
            $table->unsignedBigInteger('unite_id')->nullable();
            $table->unsignedBigInteger('services_investigateurs');
            $table->date('date_apprehension')->nullable();
            $table->string('localite_aprrehension')->nullable();
            $table->string('longitude', 25)->nullable();
            $table->string('latitude', 25)->nullable();
            $table->text('gestion_des_saisis')->nullable();
            $table->integer('quantite_saisie')->nullable();
            $table->integer('nombre_complice')->nullable();
            $table->boolean('veto')->nullable();
            $table->boolean('lien_terrorisme')->default(false);
            $table->string('victime', 100)->nullable();
            $table->unsignedBigInteger('aire_protegee_id');
            $table->timestamps();



            $table->foreign('nature_crime_id')->references('id')->on('crime_natures')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('type_crime_id')->references('id')->on('type_crimes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_apprehension')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_destination')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_origine_produit')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('unite_id')->references('id')->on('unites')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('services_investigateurs')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('condition_produit_id')->references('id')->on('condition_produits')->onDelete('restrict')
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
