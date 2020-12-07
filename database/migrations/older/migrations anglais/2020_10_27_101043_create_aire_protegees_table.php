<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAireProtegeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protected_areas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('wording', 255);
            $table->string('area_wdpa_code', 100);
            $table->text('adress');
            $table->unsignedBigInteger('country_id');
            $table->integer('phone');
            $table->text('map');
            $table->text('logo');
            $table->text('cover_image');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('restrict')
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
        Schema::dropIfExists('protected_areas');
    }
}
