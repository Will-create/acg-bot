<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nom', 50);
            $table->string('prenom', 100);
            $table->foreignId('role_id');
            $table->boolean('actif')->default(true);
            $table->string('titre', 50)->nullable();
            $table->string('email', 60)->unique();
            $table->string('tel');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->rememberToken();
            $table->timestamps();
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict')
            // ->onUpdate('restrict');
            // $table->foreign('pay_id')->references('id')->on('pays')->onDelete('restrict')
            // ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
