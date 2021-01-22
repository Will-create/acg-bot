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
            $table->foreignId('mode_id');
            $table->foreignId('suite_id')->nullable();
            $table->foreignId('crime_id');
            $table->foreignId('auteur_id');
            $table->integer('amende')->nullable();
            $table->timestamps();

            // $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
            // ->onUpdate('restrict');

            // $table->foreign('auteur_id')->references('id')->on('crime_auteurs')->onDelete('restrict')
            // ->onUpdate('restrict');
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
