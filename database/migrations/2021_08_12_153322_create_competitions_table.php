<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('competition');
            $table->string('federation');
            $table->integer('competition_id')->nullable();
            $table->text('description');
            $table->uuid('uuid')->nullable();
            $table->boolean('caches')->default(false);
            // $table->foreignId('date_id')->nullable();
            // $table->foreign('date_id')->references('id')->on('dates')->onDelete('restrict')
            // ->onUpdate('restrict');
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
        Schema::dropIfExists('competitions');
    }
}
