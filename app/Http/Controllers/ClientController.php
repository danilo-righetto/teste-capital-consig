<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepositoryEloquent;
use App\Models\Client;
use App\Http\Requests\ClientFormRequest;

class ClientController extends Controller
{
    public function __construct(private ClientRepositoryEloquent $repository)
    {
    }

    public function index(Request $request)
    {
        $clients = Client::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view('clients.index')->with('clients', $clients)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientFormRequest $request)
    {
        $client = $this->repository->create($request);

        return to_route('clients.index')->with('mensagem.sucesso', "Cliente '{$client->nome}' adicionado(a) com sucesso");
    }

    public function show(Client $client)
    {
        return view('clients.show')->with('client', $client)->with('btname', 'Editar');
    }

    public function edit(Client $client)
    {
        return view('clients.edit')->with('client', $client);
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

        return to_route('clients.index')->with('mensagemSucesso', "Cliente - '{$client->nome}', editado(a) com sucesso");
    }

    public function destroy()
    {
    }

    public function destroyAll()
    {
    }
}
