<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'                   => $this->faker->firstName,
            'titre'                 => $this->faker->title,
            'actif'                 => true,
            'role_id'               => 1,
            'profile_photo_path'    => "/images/pngs/bg-l.png",
            'prenom'                => $this->faker->lastName,
            'email'                 => $this->faker->safeEmail,
            'tel'                   => $this->faker->phoneNumber,
            'password'              => Hash::make('00000000'),
            'localite_id'              => $this->faker->numberBetween($min = 1, $max = 5),
            'uuid'                  => Str::uuid(),
            'pay_id'                => rand(1,16)
        ];
    }
}
