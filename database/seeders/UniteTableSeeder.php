<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Pay;
use App\Models\Ville;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Unite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UniteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        $pays=Pay::all();
        $users=User::all();
        $villes=Ville::all();
        $types=Type::all();
        Unite::truncate();


        foreach($villes as $ville){
            $unite = Unite::create([
                'designation'                    =>$faker->name,
                'type_id'                        =>rand(1,$types->count()),
                'tel'                            =>$faker->phoneNumber,
                'adresse'                        =>substr($faker->text,0,250),
                'ville_id'                       =>$ville->id,
                'pays_id'                        =>rand(1,$pays->count()),
                'long'                           =>rand(0,1).','.rand(800000,9000000),
                'lat'                            =>rand(0,1).','.rand(800000,9000000),
                'responsable_id'                 =>rand(1,$users->count()),
                'logo'                           =>$faker->file($sourceDir= 'D:\Switch Maker\image', $targetDir= 'D:\Switch Maker\criminalite\storage\app\public\logo_photos', false),
                'photo_couverture'               =>$faker->file($sourceDir= 'D:\Switch Maker\cover', $targetDir= 'D:\Switch Maker\criminalite\storage\app\public\cover_photos', false),
                'uuid'                          =>Str::uuid()
            ]);
        }
    }
}
