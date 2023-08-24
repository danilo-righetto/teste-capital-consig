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

    public function index()
    {
        $clients = Client::all();
        return view('clients.index')->with('clients', $clients);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientFormRequest $request)
    {
    }

    public function show(Client $client)
    {
        return view('clients.show')->with('client', $client)->with('btname', 'Editar');
    }

    public function edit(Client $client)
    {
        return view('clients.edit')->with('client', $client);
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
