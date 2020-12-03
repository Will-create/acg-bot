<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ville = [
            'Ouagadougou', 'Bobo Dioulasso', 'Banfora', 'Ouahigouya'
        ];
        //User::truncate();
        $faker = Factory::create();
        $roles = Role::all();
        foreach ($roles as $key => $role) {
            User::create([
                'nom'                   => $faker->firstName,
                'titre'                 => $faker->title,
                'actif'                 => true,
                'role_id'               => $role->id,
                'profile_photo_path'    => "/images/pngs/bg-l.png",
                'prenom'                => $faker->lastName,
                'email'                 => $faker->safeEmail,
                'tel'                   => $faker->phoneNumber,
                'password'              => Hash::make('00000000'),
                'localite_id'              => $faker->numberBetween($min = 1, $max = 5),
                'uuid'                  => Str::uuid(),
                'pay_id'                => rand(1,16)
            ]);
        }
    }
}
