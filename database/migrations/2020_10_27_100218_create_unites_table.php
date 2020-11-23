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
     * 
     */
    public function up()
    {
        Schema::create('unites', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 100);
            $table->uuid('uuid');
            $table->unsignedBigInteger('localite_id');
            $table->unsignedBigInteger('pays_id');
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('type_unite_id');
            $table->string('tel', 40);
            $table->string('tel2',40)->nullable();
            $table->text('adresse', 200);
            $table->string('lat', 25)->nullable();
            $table->string('long', 25)->nullable();
            $table->string('administration_tutelle')->nullable();
            $table->mediumText('logo')->nullable();
            $table->mediumText('photo_couverture')->nullable();
            $table->timestamps();
            $table->foreign('localite_id')->references('id')->on('localites')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('type_unite_id')->references('id')->on('type_unites')->onDelete('restrict')
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



