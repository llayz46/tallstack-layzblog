<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->sentence,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(7, true),
            'resume' => $this->faker->sentence,
            'views' => $views = $this->faker->numberBetween(0, 1000),
            'likes' => $this->faker->numberBetween(0, $views),
            'category_id' => Category::factory(),
        ];
    }
}
