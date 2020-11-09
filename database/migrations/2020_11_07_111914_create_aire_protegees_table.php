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
            $table->string('uuid');
            $table->string('libelle');
            $table->text('adresse');
            $table->unsignedBigInteger('pays_id');
            $table->integer('tel');
            $table->text('map');
            $table->text('logo');
            $table->text('image_couverture');
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
