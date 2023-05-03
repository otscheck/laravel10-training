<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titre = fake()->sentence;
        $slug = Str::slug($titre, '-');

        return [
            'user_id'=>DB::table('users')->inRandomOrder()->value('id'),
            'titre'=>$titre,
            'slug'=>$slug,
            'excerpt'=>fake()->sentence,
            'description'=>fake()->sentence,
            'est_publie'=>fake()->boolean,
            'min_a_lire'=>fake()->randomDigit(),
        ];
    }
}
