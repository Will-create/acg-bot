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
            $table->unsignedBigInteger('condition_produit_id')->nullable();
            $table->unsignedBigInteger('type_crime_id')->nullable();
            $table->unsignedBigInteger('espece_id')->nullable();
            $table->unsignedBigInteger('pays_apprehension')->nullable();
            $table->unsignedBigInteger('pays_destination')->nullable();
            $table->unsignedBigInteger('pays_origine_produit')->nullable();
            $table->unsignedBigInteger('services_investigateurs')->nullable();
            $table->date('date_apprehension')->nullable();
            $table->date('date_abattage')->nullable();
            $table->string('localite_apprehension')->nullable();
            $table->string('longitude', 25)->nullable();
            $table->string('latitude', 25)->nullable();
            $table->unsignedBigInteger('gestion_des_saisies')->nullable();
            $table->boolean('veto')->nullable();
            $table->boolean('valide')->nullable();
            $table->boolean('lien_terrorisme')->default(false);
            $table->string('victime', 100)->nullable();
            $table->unsignedBigInteger('aire_protegee_id')->nullable();
            $table->timestamps();
            $table->foreign('espece_id')->references('id')->on('especes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('type_crime_id')->references('id')->on('type_crimes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('aire_protegee_id')->references('id')->on('aire_protegees')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_apprehension')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_destination')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_origine_produit')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('services_investigateurs')->references('id')->on('unites')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('gestion_des_saisies')->references('id')->on('unites')->onDelete('restrict')
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
