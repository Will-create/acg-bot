<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->string('scheduled');
            $table->string('type');
            $table->string('contenu');
            $table->string('contenu_edited');
            $table->boolean('envoye')->default(false);
            $table->boolean('edited')->default(false);
            $table->boolean('invalide')->default(false);
            $table->uuid('uuid');
            $table->foreignId('match_id');
            $table->foreignId('user_id');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')
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
        Schema::dropIfExists('events');
    }
}
