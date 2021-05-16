<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->text('contenu_entree')->nullable();
            $table->text('contenu_sortie')->nullable();
            $table->string('destination')->nullable();
            $table->string('operateur')->nullable();
            $table->string('destination_id')->nullable();
            $table->string('menu')->nullable();
            $table->string('sousmenu')->nullable();
            $table->dateTime('valide_de')->nullable();
            $table->dateTime('valide_a')->nullable();
            $table->boolean('valide')->default(false);
            $table->boolean('envoye')->default(false);
            $table->boolean('verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable();
            $table->timestamps();
            $table->foreignId('api_id')->nullable();
            $table->foreign('api_id')->references('id')->on('apis')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('verified_by')->references('id')->on('users')->onDelete('restrict')
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
        Schema::dropIfExists('sms');
    }
}