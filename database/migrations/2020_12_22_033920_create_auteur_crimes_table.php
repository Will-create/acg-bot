<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuteurCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auteur_crimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auteur_id');
            $table->unsignedBigInteger('crime_id');
            $table->foreign('auteur_id')->references('id')->on('crime_auteurs')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('auteur_crimes');
    }
}
