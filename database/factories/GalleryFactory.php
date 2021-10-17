<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->word(),
            'description'=>$this->faker->text(300),
            'img'=> 'storage/gallery/' . $this->faker->image('public/storage/gallery', 700, 700, null, false),
            'user_id'=>User::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
        ];
    }
}
