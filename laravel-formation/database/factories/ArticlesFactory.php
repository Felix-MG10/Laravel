<?php

namespace Database\Factories;

use App\Models\articles;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre'=>$this->faker->sentence(),
            'description'=> $this->faker-> text(),
            'user_id'=>User::All()->random()->id,
        ];
    }
}
