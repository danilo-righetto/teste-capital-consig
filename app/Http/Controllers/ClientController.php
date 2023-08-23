<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepositoryEloquent;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct(private ClientRepositoryEloquent $repository)
    {
    }

    public function index()
    {
        $clients = Client::where('ativo', 1)->limit(3)->get();
        return view('clients.index')->with('clients', $clients);
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function show()
    {
    }

    public function edit()
    {
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
