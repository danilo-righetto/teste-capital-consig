<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;
use App\Models\Client;

class ClientTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     */
    public function testClientAttributes(): void
    {
        /* Arrange */
        $client = $this->getClient();

        /* Act */

        /* Assert */
        $this->assertIsString($client->nome);
        $this->assertIsString($client->email);
        $this->assertIsString($client->cpf);
        $this->assertInstanceOf('DateTime', $client->data_nascimento);
        $this->assertIsString($client->rua);
        $this->assertIsString($client->numero_rua);
        $this->assertIsString($client->cep);
        $this->assertIsString($client->cidade);
        $this->assertIsString($client->estado);
        $this->assertIsBool($client->ativo);
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    private function getClient(): Client
    {
        $faker = Faker::create('pt_BR');

        $client = new Client();
        $client->nome = $faker->name();
        $client->email = $faker->unique()->safeEmail();
        $client->cpf = $faker->cpf();
        $client->data_nascimento = $faker->dateTime();
        $client->rua = $faker->streetName();
        $client->numero_rua = $faker->buildingNumber();
        $client->cep = $faker->postcode();
        $client->cidade = $faker->city();
        $client->estado = $faker->stateAbbr();
        $client->ativo = $faker->randomElement(array(true, false));

        return $client;
    }
}
