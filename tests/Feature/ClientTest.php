<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Client;
use Faker\Factory as Faker;

class ClientTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testGetClientsResponse(): void
    {
        /* Arrange */
        $client = Client::factory(1)->create();
        $clientArray = [[
            'id' => $client[0]->id,
            'nome' => $client[0]->nome,
            'email' => $client[0]->email,
            'cpf' => $client[0]->cpf,
            'data_nascimento' => $client[0]->data_nascimento->format('Y-m-d H:i:s'),
            'rua' => $client[0]->rua,
            'numero_rua' => $client[0]->numero_rua,
            'cep' => $client[0]->cep,
            'cidade' => $client[0]->cidade,
            'estado' => $client[0]->estado,
            'ativo' => $client[0]->ativo == true ? 1 : 0
        ]];

        /* Act */
        $response = $this->get('/api/clients');

        /* Assert */
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertContent(json_encode($clientArray));
        $response->assertExactJson($clientArray);
        $response->assertHeader('cache-control', 'no-cache, private');
        $response->assertHeader('content-type', 'application/json');
        $response->assertHeader('x-ratelimit-limit', '60');
        $response->assertHeader('x-ratelimit-remaining', '59');
        $response->assertHeader('access-control-allow-origin', '*');
        $response->assertJsonPath('0.id', $client[0]->id);
        $response->assertJsonPath('0.nome', $client[0]->nome);
        $response->assertJsonPath('0.email', $client[0]->email);
        $response->assertJsonPath('0.cpf', $client[0]->cpf);
        $response->assertJsonPath('0.data_nascimento', $client[0]->data_nascimento->format('Y-m-d H:i:s'));
        $response->assertJsonPath('0.rua', $client[0]->rua);
        $response->assertJsonPath('0.numero_rua', $client[0]->numero_rua);
        $response->assertJsonPath('0.cep', $client[0]->cep);
        $response->assertJsonPath('0.cidade', $client[0]->cidade);
        $response->assertJsonPath('0.estado', $client[0]->estado);
        $response->assertJsonPath('0.ativo', $client[0]->ativo == true ? 1 : 0);
    }

    public function testGetOneClientResponse(): void
    {
        /* Arrange */
        $client = Client::factory(1)->create();
        $clientArray = [
            'id' => $client[0]->id,
            'nome' => $client[0]->nome,
            'email' => $client[0]->email,
            'cpf' => $client[0]->cpf,
            'data_nascimento' => $client[0]->data_nascimento->format('Y-m-d H:i:s'),
            'rua' => $client[0]->rua,
            'numero_rua' => $client[0]->numero_rua,
            'cep' => $client[0]->cep,
            'cidade' => $client[0]->cidade,
            'estado' => $client[0]->estado,
            'ativo' => $client[0]->ativo == true ? 1 : 0
        ];

        /* Act */
        $response = $this->get('/api/clients/' . $client[0]->id);

        /* Assert */
        $response->assertStatus(200);
        $response->assertJsonCount(11);
        $response->assertContent(json_encode($clientArray));
        $response->assertExactJson($clientArray);
        $response->assertHeader('cache-control', 'no-cache, private');
        $response->assertHeader('content-type', 'application/json');
        $response->assertHeader('x-ratelimit-limit', '60');
        $response->assertHeader('x-ratelimit-remaining', '59');
        $response->assertHeader('access-control-allow-origin', '*');
        $response->assertJsonPath('id', $client[0]->id);
        $response->assertJsonPath('nome', $client[0]->nome);
        $response->assertJsonPath('email', $client[0]->email);
        $response->assertJsonPath('cpf', $client[0]->cpf);
        $response->assertJsonPath('data_nascimento', $client[0]->data_nascimento->format('Y-m-d H:i:s'));
        $response->assertJsonPath('rua', $client[0]->rua);
        $response->assertJsonPath('numero_rua', $client[0]->numero_rua);
        $response->assertJsonPath('cep', $client[0]->cep);
        $response->assertJsonPath('cidade', $client[0]->cidade);
        $response->assertJsonPath('estado', $client[0]->estado);
        $response->assertJsonPath('ativo', $client[0]->ativo == true ? 1 : 0);
    }

    public function testPostClientResponse(): void
    {
        /* Arrange */
        $clientArray = $this->createClient();

        /* Act */
        $response = $this->postJson('/api/clients', $clientArray);
        $responseArray = json_decode($response->getContent());
        $clientArray['id'] = $responseArray->id;

        /* Assert */
        $response->assertStatus(200);
        $response->assertJsonCount(11);
        $response->assertContent(json_encode($clientArray));
        $response->assertExactJson($clientArray);
        $response->assertHeader('cache-control', 'no-cache, private');
        $response->assertHeader('content-type', 'application/json');
        $response->assertHeader('x-ratelimit-limit', '60');
        $response->assertHeader('x-ratelimit-remaining', '59');
        $response->assertHeader('access-control-allow-origin', '*');
        $response->assertJsonPath('id', $clientArray['id']);
        $response->assertJsonPath('nome', $clientArray['nome']);
        $response->assertJsonPath('email', $clientArray['email']);
        $response->assertJsonPath('cpf', $clientArray['cpf']);
        $response->assertJsonPath('data_nascimento', $clientArray['data_nascimento']);
        $response->assertJsonPath('rua', $clientArray['rua']);
        $response->assertJsonPath('numero_rua', $clientArray['numero_rua']);
        $response->assertJsonPath('cep', $clientArray['cep']);
        $response->assertJsonPath('cidade', $clientArray['cidade']);
        $response->assertJsonPath('estado', $clientArray['estado']);
        $response->assertJsonPath('ativo', $clientArray['ativo']);
    }

    private function createClient(): array
    {
        $faker = Faker::create('pt_BR');

        return [
            'nome' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'cpf' => $faker->cpf(),
            'data_nascimento' => $faker->dateTime()->format('Y-m-d'),
            'rua' => $faker->streetName(),
            'numero_rua' => $faker->buildingNumber(),
            'cep' => $faker->postcode(),
            'cidade' => $faker->city(),
            'estado' => $faker->stateAbbr(),
            'ativo' => $faker->randomElement(array(true, false))
        ];
    }
}
