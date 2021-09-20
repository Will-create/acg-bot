<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('onglet')->nullable();
            $table->boolean('automatique')->default(false);
            $table->boolean('connecte')->default(false);
            $table->boolean('power')->default(false);
            $table->string('heure_envoie');
            $table->uuid('uuid');
            $table->foreignId('edition_id');
            $table->foreign('edition_id')->references('id')->on('dates')->onDelete('restrict')
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
        Schema::dropIfExists('configs');
    }
}
