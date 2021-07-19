<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoupeDuMondesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupe_du_mondes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('content')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')
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
        Schema::dropIfExists('coupe_du_mondes');
    }
}
