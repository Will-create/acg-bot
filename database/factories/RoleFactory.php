<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roles = ['Agent d’une Unité', 'Chef d’Unité', 'Coordonnateur National', 'Coordonnateur Régional', 'Administrateur Général'];
        return [
            'uuid'          => Str::uuid(),
            'designation'   => $roles[rand(0, count($roles) - 1)],
            'description'   => 'La description'
        ];
    }
}
