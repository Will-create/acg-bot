<?php

namespace Database\Factories;

use App\Models\Unite;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'designation'             =>$this->faker->name,
        ];
    }
}
