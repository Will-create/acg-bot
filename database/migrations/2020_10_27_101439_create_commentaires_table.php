<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('crime_id');
            $table->unsignedBigInteger('par');
            $table->unsignedBigInteger('pour');
            $table->text('commentaire');
            $table->timestamps();


            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('par')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('pour')->references('id')->on('users')->onDelete('restrict')
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
        Schema::dropIfExists('commentaires');
    }
}
