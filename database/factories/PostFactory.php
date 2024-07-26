<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $thumnails = ['database.png', 'node.png', 'php.png', 'programming.jpg', 'python.jpeg'];
        $categoryIds = Category::pluck('id')->toArray(); // [1,2,3]

        return [
            'user_id' => 1,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'thumnail' => 'uploads/' . $this->faker->randomElement($thumnails),
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }

    /**
     * Configure the factory with additional states.
     *
     * @return $this
     */
    public function configure()
    {
        $tags = Tag::pluck('id')->toArray(); // [1,2,3]

        return $this->afterCreating(function (Post $post) use ($tags) {
            // Use the Faker instance to get random elements from the array
            $randomTags = \Illuminate\Support\Arr::random($tags, 2);
            $post->tags()->sync($randomTags);
        });
    }
}
