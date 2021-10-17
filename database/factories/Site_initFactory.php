<?php

namespace Database\Factories;

use App\Models\Site_init;
use Illuminate\Database\Eloquent\Factories\Factory;

class Site_initFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Site_init::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_section_title'=>$this->faker->sentence(),
            'img_first_section'=> 'storage/siteinit/'. $this->faker->image('public/storage/siteinit', 700, 500, null, false),
            'first_description'=>$this->faker->text(1000),
            'second_section_title'=>$this->faker->sentence(),
            'second_description'=>$this->faker->text(1000),
            'twitter'=>$this->faker->email(),
            'facebook'=>$this->faker->email(),
            'whatsapp'=>$this->faker->email(),
        ];
    }
}
