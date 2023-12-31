<?php

namespace Database\Factories\Attributes;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attributes\Color>
 */
class ColorFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $name = fake()->unique()->words( rand( 1, 3 ), true );
        $slug = Str::of( $name )->slug( '-' );

        return [
            'hex'  => fake()->unique()->hexColor(),
            'name' => $name,
            'slug' => $slug
        ];
    }
}
