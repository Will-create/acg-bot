<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitesTable extends Migration
{   
    /**
     * Run the migrations.
     *
     * @return void
     * 
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 100);
            $table->uuid('uuid');
            $table->unsignedBigInteger('locality_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('leader_id');
            $table->unsignedBigInteger('unit_type_id');
            $table->string('phone', 40);
            $table->string('phone2',40)->nullable();
            $table->text('adress', 200);
            $table->string('lat', 25)->nullable();
            $table->string('long', 25)->nullable();
            $table->string('supervising_administration')->nullable();
            $table->mediumText('logo')->nullable();
            $table->mediumText('cover_photo')->nullable();
            $table->timestamps();
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('leader_id')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('unit_type_id')->references('id')->on('unit_types')->onDelete('restrict')
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
        Schema::dropIfExists('units');
    }
}



