<?php

namespace Database\Factories;

use App\Models\Band;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'biography' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'band_id' => Band::factory(),
            'thumbnail' => $this->faker->text(50),
            'image' => $this->faker->text(50),
            'download-link' => $this->faker->text(50),


        ];
    }
}
