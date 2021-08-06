<?php

namespace Database\Seeders;
use App\Models\Role;
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
        //User::truncate();
        $roles = Role::all();
         User::create([
           'nom'                   => $faker->firstName,
            'titre'                 => $faker->title,
            'actif'                 => true,
            'role_id'               => 1,
            'profile_photo_path'    => "/images/pngs/bg-l.png",
            // 'profile_photo_path'                 => 'profile_photo_path/'.$faker->file($sourceDir = 'D:\switch_maker\war_crimes\public\images\user', $targetDir = 'D:\switch_maker\war_crimes\public\storage\profile_photo_path', false),
            'prenom'                => $faker->lastName,
            'email'                 => 'admin@africconsultinggroup.com',
            'tel'                   => $faker->phoneNumber,
            'password'              => Hash::make('987654321'),
            'uuid'                  => Str::uuid(),
        ]);
        User::create([
            'nom'                   => $faker->firstName,
            'titre'                 => $faker->title,
            'actif'                 => true,
            'role_id'               => 2,
            'profile_photo_path'    => "/images/pngs/bg-l.png",
            'prenom'                => $faker->lastName,
            'email'                 => 'agent@africconsultinggroup.com',
            'tel'                   => $faker->phoneNumber,
            'password'              => Hash::make('987654321'),
            'uuid'                  => Str::uuid(),
        ]);
        foreach ($roles as $key => $role) {
        for ($i=0; $i <100 ; $i++) {
            $user =   User::create([
                'nom'                   => $faker->firstName,
                'titre'                 => $faker->title,
                'actif'                 => true,
                'role_id'               => $role->id,

                //'profile_photo_path'                 => 'profile_photo_path/'.$faker->file($sourceDir = 'D:\switch_maker\war_crimes\public\images\user', $targetDir = 'D:\switch_maker\war_crimes\public\storage\profile_photo_path', false),
                'profile_photo_path'                 => 'profile_photo_path/'.$faker->file($sourceDir = '/home/louisbertson/Desktop/criminalite/public/assets/images/users', $targetDir = '/home/acg-dev/Bureau/projets/acg-bot/public/storage/profile_photo_path', false),
                'prenom'                => $faker->lastName,
                'email'                 => $faker->unique()->freeEmail,
                'tel'                   => $faker->phoneNumber,
                'password'              => Hash::make('987654321'),
                'uuid'                  => Str::uuid(),
                'pay_id'                => rand(1,16)
            ]);
            // if ($user->role->designation == "Agent d’une Unité" || $user->role->designation == "Chef d’Unité") {
            // $user->unite_id  = Unite::inrandomOrder()->first()->id;
            // }

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
