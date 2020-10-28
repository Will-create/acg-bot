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
        $faker = Factory::create();
        $user =   User::create([
            'nom'                   => $faker->firstName,
            'titre'                 => 'Administrateur',
            'actif'                 => true,
            'role_id'               => Role::oldest()->first()->id,
            'unite_id'              => 1,
            'profile_photo_path'    => $faker->file($sourceDir = 'D:\kema\productImage', $targetDir = 'D:\Switch Maker\criminalite\storage\app\public\user_photo_profile', false),
            'prenom'                => $faker->lastName,
            'email'                 => 'admin@admin.com',
            'tel'                   => $faker->phoneNumber,
            'password'              => Hash::make('00000000'),
            'ville'                 => $faker->city,
            'uuid'                  => Str::uuid(),
        ]);
    }
}
