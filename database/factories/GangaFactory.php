<?php

namespace Database\Factories;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $original_price= $this->faker->randomFloat(2,1,2000);

        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'url'=> $this->faker->url(),
            'id_category' => $this->faker->numberBetween(1,3),
            'points' => $this->faker->randomDigit(),
            'price'=> $original_price,
            'discount_price'=>$this->faker->numberBetween(1,$original_price),
            'available'=>$this->faker->boolean(),
        ];
    }
}
