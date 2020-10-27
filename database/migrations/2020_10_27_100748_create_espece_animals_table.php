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
            $table->string('uuid');
            $table->string('nom');
            $table->string('famille');
            $table->string('nom_scientifique')->nullable();
            $table->mediumText('photo')->nullable();
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
        Schema::dropIfExists('espece_animals');
    }
}
