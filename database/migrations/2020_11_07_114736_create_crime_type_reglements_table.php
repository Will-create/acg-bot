<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeTypeReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_type_reglements', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['transaction forestiere', 'poursuite judiciaire']);
            $table->enum('suite', ['emprisonnement', 'amende']);
            $table->text('decision_justice');
            $table->unsignedBigInteger('crime_id');
            $table->unsignedBigInteger('auteur_id');
            $table->timestamps();

            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('auteur_id')->references('id')->on('crime_auteurs')->onDelete('restrict')
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
        Schema::dropIfExists('crime_type_reglements');
    }
}
