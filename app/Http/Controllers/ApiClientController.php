<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepositoryEloquent;
use App\Http\Requests\ClientFormRequest;
use App\Models\Client;

class ApiClientController extends Controller
{
    public function __construct(private ClientRepositoryEloquent $repository)
    {
    }

    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function getOne(Client $client)
    {
        $client = Client::find($client->id);
        return response()->json($client);
    }

    public function store(ClientFormRequest $request)
    {
        $client = $this->repository->create($request);
        return response()->json($client);
    }

    public function update(Client $client, ClientFormRequest $request)
    {
        $client->nome = $request->nome;
        $client->email = $request->email;
        $client->cpf = $request->cpf;
        $client->data_nascimento = date('Y-m-d H:i:s', strtotime($request->data_nascimento));
        $client->rua = $request->rua;
        $client->numero_rua = $request->numero_rua;
        $client->cep = $request->cep;
        $client->cidade = $request->cidade;
        $client->estado = $request->estado;
        $client->ativo = $request->ativo;
        $client->save();

        return response()->json($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json($client);
    }
}
