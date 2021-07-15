<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */
    public function up() 
    { 
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('pseudo', 100)->nullable();
            $table->string('operateur', 100)->nullable();
            $table->boolean('cache')->default(false);
            $table->text('description')->nullable();
            $table->uuid('uuid');
            $table->string('get')->nullable();
            $table->string('post')->nullable();
            $table->uuid('parent_uuid')->nullable();
            $table->foreignId('type_menu_id');
            $table->timestamps();
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('automate_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('type_menu_id')->references('id')->on('type_menus')->onDelete('restrict')
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
        Schema::dropIfExists('menus');
    }
}



