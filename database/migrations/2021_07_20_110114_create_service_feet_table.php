<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFeetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_feet', function (Blueprint $table) {
            $table->id(); 
            $table->uuid('uuid')->nullable();
            $table->string('content')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreignId('coupe_du_monde_id')->nullable();
            $table->foreign('coupe_du_monde_id')->references('id')->on('coupe_du_mondes')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreignId('ligue_champion_id')->nullable();
            $table->foreign('ligue_champion_id')->references('id')->on('ligue_des_champions')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreignId('europa_id')->nullable();
            $table->foreign('europa_id')->references('id')->on('europa_ligues')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreignId('euro_id')->nullable();
            $table->foreign('euro_id')->references('id')->on('euros')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreignId('copa_id')->nullable();
            $table->foreign('copa_id')->references('id')->on('copas')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreignId('can_id')->nullable();
            $table->foreign('can_id')->references('id')->on('cans')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->string('modifier')->nullable();
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
        Schema::dropIfExists('service_feet');
    }
}
