<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_sms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->nullable();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreignId('sms_id')->nullable();
            $table->foreign('sms_id')->references('id')->on('sms')->onDelete('restrict')
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
        Schema::dropIfExists('menu_sms');
    }
}
