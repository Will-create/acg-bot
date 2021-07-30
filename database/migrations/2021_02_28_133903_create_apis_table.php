<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('apis', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('fournisseur', 100)->nullable();
            $table->string('methode', 100)->nullable();
            $table->text('description')->nullable();
            $table->boolean('gratuit')->default(false);
            $table->string('api_key')->nullable();
            $table->string('url')->nullable();
            $table->string('url_envoie')->nullable();
            $table->dateTime('date_debut_licence')->nullable();
            $table->dateTime('date_fin_licence')->nullable();
            $table->dateTime('valide_a')->nullable();
            $table->uuid('uuid')->nullable();
            $table->uuid('menu_uuid')->nullable();
            $table->foreignId('menu_id')->nullable();
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('restrict')
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
        Schema::dropIfExists('apis');
    }
}
