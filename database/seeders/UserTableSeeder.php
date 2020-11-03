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
        User::truncate();
        $faker = Factory::create();
        $roles = Role::all();
        foreach ($roles as $key => $role) {
            $user =   User::create([
                'nom'                   => $faker->firstName,
                'titre'                 => $faker->title,
                'actif'                 => true,
                'role_id'               => $role->id,
                'unite_id'              => 1,
                'profile_photo_path'    => $faker->file($sourceDir = '/home/louisbertson/Desktop/criminalite/public/assets/images/users', $targetDir = '/home/louisbertson/Desktop/criminalite/public/user_profile_photo', false),
                'prenom'                => $faker->lastName,
                'email'                 => $faker->safeEmail,
                'tel'                   => $faker->phoneNumber,
                'password'              => Hash::make('00000000'),
                'ville_id'              => $faker->numberBetween($min = 1, $max = 5),
                'uuid'                  => Str::uuid(),
                'pay_id'                => rand(1,16)
            ]);
        }
    }
}
