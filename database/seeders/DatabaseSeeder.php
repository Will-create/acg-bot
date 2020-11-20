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
        $this->call(PaysTableSeeder::class);
        $this->call(VilleTableSeeder::class);
        $this->call(TypeUniteTableSeeder::class);
        $this->call(TypeCrimeTableSeeder::class);
        //\App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UniteTableSeeder::class);
        $this->call(OrdreTableSeeder::class);
        $this->call(EspaceTableSeeder::class);
    }
}
