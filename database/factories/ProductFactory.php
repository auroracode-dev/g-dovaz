<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'description'=>$this->faker->text(200),
            'preview'=>$this->faker->text(20),
            'file'=>$this->faker->text(10),
            'price'=> intval($this->faker->randomElement(['50000', '10000','100000'])),
            'img'=> 'storage/product/' . $this ->faker->image('public/storage/product', 700, 500, null, false),
            'user_id'=>User::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
             ];
    }
}
