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
        $this->call(LocaliteTableSeeder::class);
        $this->call(TypeUniteTableSeeder::class);
        $this->call(TypeCrimeTableSeeder::class);
        //  \App\Models\Pay::factory(16)->create();
        //  \App\Models\Role::factory(5)->create();
        //  \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UniteTableSeeder::class);
        $this->call(OrdreTableSeeder::class);
        $this->call(EspeceTableSeeder::class);
        $this->call(AireTableSeeder::class);
    }
}
