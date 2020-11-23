<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeEspecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('crime_especes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('crime_id');
            $table->unsignedBigInteger('espece_id');
            $table->timestamps();
            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('espece_id')->references('id')->on('especes')->onDelete('restrict')
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
        Schema::dropIfExists('crime_especes');
    }
}
