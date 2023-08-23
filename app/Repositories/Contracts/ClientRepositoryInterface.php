<?php

namespace App\Repositories\Contracts;

use App\Models\Client;

interface ClientRepositoryInterface
{
    public function create();

    public function find();

    public function findAll();

    public function update();

    public function destroy();

    public function destroyAll();
}
