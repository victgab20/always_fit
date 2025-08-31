<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\Exercise\Model\Exercise;

/**
 * @extends Factory<\App\Domain\Exercise\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    protected $model = Exercise::class;

    public function definition(): array
    {
        return [
            'name'       => $this->faker->words(2, true),   // exemplo: "Supino reto"
            'slug'       => $this->faker->unique()->slug(), // exemplo: "supino-reto"
            'image_path' => null,
        ];
    }
}
