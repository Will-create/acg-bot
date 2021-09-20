<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->string('scheduled');
            $table->string('status');
            $table->string('score');
            $table->integer('home_id');
            $table->string('home_name');
            $table->string('home_flag');
            $table->integer('away_id');
            $table->string('away_name');
            $table->string('away_flag');
            $table->boolean('termine')->default(false);
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
        Schema::dropIfExists('matches');
    }
}
