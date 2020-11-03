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
            $table->string('uuid');
            $table->string('nom');
            $table->string('prenom');
            $table->foreignId('role_id');
            $table->foreignId('unite_id')->nullable();
            $table->boolean('actif')->default(true);
            $table->string('titre')->nullable();
            $table->string('ville_id')->nulllable();
            $table->foreignId('pay_id')->nulllable();
            $table->string('email')->unique();
            $table->string('tel');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
