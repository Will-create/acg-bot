<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            $table->text('message_arriver')->nullable();
            $table->text('message_modifier')->nullable();
            $table->uuid('uuid')->nullable();
            $table->foreignId('par')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('opearteur_id')->nullable();
            $table->foreignId('type_menu_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('opearteur_id')->references('id')->on('operateurs')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('type_menu_id')->references('id')->on('type_menus')->onDelete('restrict')
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
        Schema::dropIfExists('validations');
    }
}
