<?php

namespace App\Repositories;

use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Models\Client;

class ClientRepositoryEloquent implements ClientRepositoryInterface
{
    private $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function create()
    {
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
