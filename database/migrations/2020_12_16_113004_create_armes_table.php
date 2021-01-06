<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('libelle');
            $table->string('reference')->nullable();
            $table->text('remarques')->nullable();
            $table->text('photo')->nullable();
            $table->unsignedBigInteger('crime_id');
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
        Schema::dropIfExists('armes');
    }
}
