<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonnelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personnel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom'=> $this->faker->firstName(),
            'datedenaissance'=> $this->faker->date(),
            'adresse'=> $this->faker->address(),
            'telephone'=> $this->faker->phoneNumber(),
            'email'=> $this->faker->email(),
        ];
    }
}
