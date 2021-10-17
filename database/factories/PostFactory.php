<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
            'title'=>$this->faker->sentence(4),
            'content'=>$this->faker->text(1000),
            'banner'=> 'storage/post/' . $this->faker->image('public/storage/post', 700, 700, null, false),
            'type'=>$this->faker->randomElement(['Blog','Estrategia Didactica']),
            'user_id'=> User::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
        ];
    }
}
