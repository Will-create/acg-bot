<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeAuteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_perpetrators', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('crime_id');
            $table->string('firstname', 50);
            $table->string('lastname', 60);
            $table->text('adress');
            $table->string('country', 25);
            $table->string('locality', 25);
            $table->enum('type', ['perpetrator', 'complice']);
            $table->date('birth_date');
            $table->enum('gender', ['male', 'femele']);
            $table->boolean('education');
            $table->boolean('international_traveler');
            $table->integer('income');
            $table->string('nationality', 25);
            $table->string('job', 100);
            $table->text('judiciary_precedent');
            $table->timestamps();


            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
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
        Schema::dropIfExists('crime_perpetrators');
    }
}
