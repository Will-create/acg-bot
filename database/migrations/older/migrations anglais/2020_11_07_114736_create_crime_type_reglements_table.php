<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimeTypeReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['forest transaction', 'legal proceeding']);
            $table->enum('following', ['imprisonment', 'fine']);
            $table->text('decision');
            $table->unsignedBigInteger('crime_id');
            $table->unsignedBigInteger('perpetrator_id');
            $table->timestamps();

            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('perpetrator_id')->references('id')->on('crime_perpetrators')->onDelete('restrict')
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
        Schema::dropIfExists('rules');
    }
}
