<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'animals', true),
            'title' => $this->faker->sentence(3),
            'slug' => \Str::slug($this->faker->sentence(3)),
            'text' => $this->faker->paragraphs(20, true)
        ];
    }
}
