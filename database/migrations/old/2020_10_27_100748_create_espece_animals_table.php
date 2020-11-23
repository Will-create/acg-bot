<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeceAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espece_animals', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nom');
            $table->string('famille');
            $table->string('statut_uicn')->nullable();
            $table->string('statut_cites')->nullable();
            $table->unsignedBigInteger('ordre_id');
            $table->string('nom_scientifique')->nullable();
            $table->mediumText('photo')->nullable();
            $table->timestamps();


            $table->foreign('ordre_id')->references('id')->on('ordres')->onDelete('restrict')
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
        Schema::dropIfExists('espece_animals');
    }
}
