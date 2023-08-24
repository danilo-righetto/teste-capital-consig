<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{

    protected $model = Client::class;

    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'cpf' => fake()->cpf(),
            'data_nascimento' => fake()->dateTime(),
            'rua' => fake()->streetName(),
            'numero_rua' => fake()->buildingNumber(),
            'cep' => fake()->postcode(),
            'cidade' => fake()->city(),
            'estado' => fake()->stateAbbr(),
            'ativo' => fake()->randomElement(array(true, false))
        ];
    }
}
