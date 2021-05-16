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
            $table->foreignId('sms_id');
            $table->foreignId('par');
            $table->text('commentaire');
            $table->timestamps();

        //     $table->foreign('sms_id')->references('id')->on('sms')->onDelete('restrict')
        // ->onUpdate('restrict');
            // $table->foreign('par')->references('id')->on('users')->onDelete('restrict')
            // ->onUpdate('restrict');

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
