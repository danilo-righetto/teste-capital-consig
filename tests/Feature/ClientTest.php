<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    /**
     * A basic test example.
     */
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
            'ativo' => $client[0]->ativo == true ? 1 : 0,
            'created_at' => $client[0]->created_at,
            'updated_at' => $client[0]->updated_at
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
}
