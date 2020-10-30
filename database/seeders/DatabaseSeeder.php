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
    {   $this->call(VilleTableSeeder::class);
        $this->call(PaysTableSeeder::class);

        //\App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

    }
}
