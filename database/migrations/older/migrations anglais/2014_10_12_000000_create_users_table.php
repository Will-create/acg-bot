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
            $table->string('firstname', 50);
            $table->string('lastname', 100);
            $table->foreignId('role_id');
            $table->foreignId('unit_id')->nullable();
            $table->boolean('active')->default(true);
            $table->string('title', 50)->nullable();
            $table->string('locality_id')->nulllable();
            $table->foreignId('country_id')->nulllable();
            $table->string('email', 60)->unique();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict')
            ->onUpdate('restrict');
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
        Schema::dropIfExists('users');
    }
}
