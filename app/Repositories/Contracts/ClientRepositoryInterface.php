<?php

namespace App\Repositories\Contracts;

use App\Models\Client;
use App\Http\Requests\ClientFormRequest;

interface ClientRepositoryInterface
{
    public function create(ClientFormRequest $request): Client;

    public function find();

    public function findAll();

    public function update();

    public function destroy();

    public function destroyAll();
}
