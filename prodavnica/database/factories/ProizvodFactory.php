<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;
use \App\Models\Vrsta;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proizvod>
 */
class ProizvodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sifra'=>$this->faker->ean8(),
            'naziv'=>$this->faker->word(),
            'prodajna_cena'=>$this->faker->numerify(),
            'kupovna_cena'=>$this->faker->numerify(),
            'stanje'=>$this->faker->numerify(),
            'vrsta_id'=>Vrsta::factory(),
            'user_id'=>User::factory(),
            'napomena'=>$this->faker->sentence(),
        ];
    }
}
