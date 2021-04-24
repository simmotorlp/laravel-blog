<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
//            'slug' => $this->faker->unique(true)->numberBetween(1, 1000),
            'description' => $this->faker->text(80),
            'parent_id' => rand(0, 10)
        ];
    }
}
