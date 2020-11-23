<?php

namespace Database\Seeders;

use App\Models\TypeUnite;
use App\Models\Pay;
use App\Models\Localite;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Unite;
use Illuminate\Support\Str;


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
        $localites=Localite::all();
        $types=TypeUnite::all();
        //Unite::truncate();


        foreach($localites as $localite){
            $unite = Unite::create([
                'designation'                    =>$faker->name,
                'type_unite_id'                  =>rand(1,$types->count()),
                'tel'                            =>$faker->phoneNumber,
                'adresse'                        =>substr($faker->text,0,250),
                'localite_id'                    =>$localite->id,
                'pays_id'                        =>rand(1,$pays->count()),
                'lat'                            =>$faker->latitude(-6,12),
                'long'                           =>$faker->longitude(2,13),
                'responsable_id'                 =>rand(1,$users->count()),
                'logo'                           =>"/images/pngs/bg-l.png",
                'photo_couverture'               =>"/images/pngs/bg-l.png",
                'uuid'                          =>Str::uuid()
            ]);
        }
    }
}
