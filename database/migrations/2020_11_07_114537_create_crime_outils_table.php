<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeOutilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_outils', function (Blueprint $table) {
            $table->id();
            $table->string('libelle', 120);
            $table->string('reference', 50);
            $table->text('remarques');
            $table->unsignedBigInteger('crime_id');
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
        Schema::dropIfExists('crime_outils');
    }
}
