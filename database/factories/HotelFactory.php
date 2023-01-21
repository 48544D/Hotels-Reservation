<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Unsplash\OAuth2\Client\Provider\Unsplash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // downloading a random hotel image and save it to the public folder
        $image = file_get_contents('https://source.unsplash.com/800x800/?hotel');
        $filename = '/hotels/logo/hotel_' . uniqid() . '.jpg';
        file_put_contents(storage_path('/app/public/' . $filename), $image);

        return [
            'name' => fake()->unique()->userName(),
            'city' => fake()->city(),
            'email' => fake()->email(),
            'logo' => $filename,
            'description' => fake()->realText(500),
            'website' => fake()->url()
        ];
    }
}
