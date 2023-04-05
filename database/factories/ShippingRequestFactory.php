<?php

namespace Database\Factories;

use App\Models\ShippingRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShippingRequestFactory extends Factory
{
    protected $model = ShippingRequest::class;

    public function definition()
    {
        return [
			'fullname' => $this->faker->name,
			'email' => $this->faker->name,
			'phone_number' => $this->faker->name,
			'zip_code_origin' => $this->faker->name,
			'zip_code_destination' => $this->faker->name,
			'long' => $this->faker->name,
			'width' => $this->faker->name,
			'high' => $this->faker->name,
			'weight' => $this->faker->name,
			'description' => $this->faker->name,
        ];
    }
}
