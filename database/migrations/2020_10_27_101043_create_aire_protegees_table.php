<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAireProtegeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aire_protegees', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('libelle', 255);
            $table->string('code_wdpa_aire', 100);
            $table->string('nom_responsable', 100);
            $table->string('prenom_responsable', 100);
            $table->text('adresse');
            $table->unsignedBigInteger('pays_id');
            $table->string('tel',45);
            $table->text('map')->nullable();
            $table->text('logo')->nullable();
            $table->text('image_couverture')->nullable();
            $table->timestamps();
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('restrict')
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
        Schema::dropIfExists('aire_protegees');
    }
}