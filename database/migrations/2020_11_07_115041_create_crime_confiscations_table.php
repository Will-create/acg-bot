<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeConfiscationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_confiscations', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 100);
            $table->string('uuid', 100);
            $table->unsignedInteger('nombre');
            $table->unsignedInteger('poids');
            $table->enum('condition', ['frais', 'vivant']);
            $table->text('description');
            $table->unsignedBigInteger('crime_id');
            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
            ->onUpdate('restrict');
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
        Schema::dropIfExists('crime_confiscations');
    }
}
