<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
  
            $table->unsignedBigInteger('product_condition_id')->nullable();
            $table->unsignedBigInteger('crime_type_id')->nullable();
            $table->unsignedBigInteger('species_id')->nullable();
            $table->unsignedBigInteger('apprehension_country')->nullable();
            $table->unsignedBigInteger('destination_country')->nullable();
            $table->unsignedBigInteger('product_origine_country')->nullable();
            $table->unsignedBigInteger('investigator_service')->nullable();
            $table->date('apprehension_date')->nullable();
            $table->date('slauther_date')->nullable();
            $table->string('apprehension_locality')->nullable();
            $table->string('longitude', 25)->nullable();
            $table->string('latitude', 25)->nullable();
            $table->boolean('veto')->nullable();
            $table->boolean('isRelatedTo_terrorism')->default(false);
            $table->string('victim', 100)->nullable();
             $table->unsignedBigInteger('protected_area_id')->nullable();
            $table->timestamps();
            $table->foreign('species_id')->references('id')->on('species')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('crime_type_id')->references('id')->on('crime_types')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('protected_area_id')->references('id')->on('protected_areas')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('apprehension_country')->references('id')->on('countries')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('destination_country')->references('id')->on('countries')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('product_origine_country')->references('id')->on('countries')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('investigator_service')->references('id')->on('units')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('product_condition_id')->references('id')->on('specimen_conditions')->onDelete('restrict')
            ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.es
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crimes');
    }
}