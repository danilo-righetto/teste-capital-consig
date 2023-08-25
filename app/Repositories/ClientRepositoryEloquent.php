<?php

namespace App\Repositories;

use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Http\Requests\ClientFormRequest;
use App\Models\Client;

class ClientRepositoryEloquent implements ClientRepositoryInterface
{
    private $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function create(ClientFormRequest $request): Client
    {
        return Client::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'data_nascimento' => date('Y-m-d', strtotime($request->data_nascimento)),
            'rua' => $request->rua,
            'numero_rua' => $request->numero_rua,
            'cep' => $request->cep,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'ativo' => $request->ativo
        ]);
    }

    public function find()
    {
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function update()
    {
    }

    public function destroy()
    {
    }

    public function destroyAll()
    {
    }
}
