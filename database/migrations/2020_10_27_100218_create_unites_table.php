<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unites', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 255);
            $table->string('uuid');
            $table->unsignedBigInteger('ville_id');
            $table->unsignedBigInteger('pays_id');
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('type_id');
            $table->string('tel');
            $table->string('code_wdpa_ aire')->nullable();
            $table->string('tel2')->nullable();
            $table->text('adresse');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('administration_tutelle')->nullable();
            $table->mediumText('logo')->nullable();
            $table->mediumText('photo_couverture')->nullable();

            $table->timestamps();



            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')
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
        Schema::dropIfExists('unites');
    }
}
