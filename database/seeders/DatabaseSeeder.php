<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
         // \App\Models\Pay::factory(16)->create();
        //  \App\Models\Role::factory(5)->create();
        //  \App\Models\User::factory(10)->create();
        // $this->call(ValidationMessage::class);
        // $this->call(Message::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(TypeMenuTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        //$this->call(MoovBeninTableSeeder::class);
        $this->call(MaliTableSeeder::class);
        $this->call(MoovTableSeeder::class);
        $this->call(ApiTableSeeder::class);
        $this->call(SmsTableSeeder::class);
        $this->call(CommentaireTableSeeder::class);
        $this->call(OperateurTableSeeder::class);
    }
}
