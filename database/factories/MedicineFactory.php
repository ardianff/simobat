<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'medicine_name' => $this->faker->sentence(3, true),
            'medicine_made' => "PT. Kimia Farma Tbk",
            'expiry_date' => $this->faker->date('Y-m-d'),
            'created_by' => 1
        ];
    }
}