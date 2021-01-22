<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\Unite;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();

        $ville = [
            'Ouagadougou', 'Bobo Dioulasso', 'Banfora', 'Ouahigouya'
        ];
        //User::truncate();
        $roles = Role::all();
        // User::create([
        //     'nom'                   => $faker->firstName,
        //     'titre'                 => $faker->title,
        //     'actif'                 => true,
        //     'role_id'               => 1,
        //     'profile_photo_path'                 => 'profile_photo_path/'.$faker->file($sourceDir = 'D:\switch_maker\war_crimes\public\images\user', $targetDir = 'D:\switch_maker\war_crimes\storage\app\public\profile_photo_path', false),

        //     'prenom'                => $faker->lastName,
        //     'email'                 => 'admin@uicn.com',
        //     'tel'                   => $faker->phoneNumber,
        //     'password'              => Hash::make('00000000'),
        //     'localite_id'              => $faker->numberBetween($min = 1, $max = 5),
        //     'uuid'                  => Str::uuid(),
            //     'pay_id'                => rand(1,16)
        // ]);
        foreach ($roles as $key => $role) {
        for ($i=0; $i <100 ; $i++) {
            $user =   User::create([
                'nom'                   => $faker->firstName,
                'titre'                 => $faker->title,
                'actif'                 => true,
                'role_id'               => $role->id,
                'profile_photo_path'    => 'profile_photo_path/'.$faker->file( 'public/images/user', 'storage/app/public/profile_photo_path', false),
                'prenom'                => $faker->lastName,
                'email'                 => $faker->unique()->freeEmail,
                'tel'                   => $faker->phoneNumber,
                'password'              => Hash::make('00000000'),
                'localite_id'              => $faker->numberBetween(1, 5),
                'uuid'                  => Str::uuid(),
                'pay_id'                => rand(1,16)
            ]);
        }

            // if($user->role->designation == "Chef d’Unité" || $user->role->designation == "Agent d’une Unité")
            // {
            //   $user->update([
            //     'unite_id'      => Unite::inRandomOrder()->first()->id
            //   ]);
            // }
        }
    }
}
