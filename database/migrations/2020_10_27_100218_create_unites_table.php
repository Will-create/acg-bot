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
            $table->string('desigantion', 255);
            $table->string('uuid');
            $table->foreignId('ville_id');
            $table->foreignId('pays');
            $table->foreignId('responsable_id');
            $table->string('type');
            $table->string('tel');
            $table->string('adresse');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->mediumText('logo')->nullable();
            $table->mediumText('photo_couverture')->nullable();

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
        Schema::dropIfExists('unites');
    }
}
