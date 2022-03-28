<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryContract;

class ClientRepository implements ClientRepositoryContract
{
    protected $model;

    /**
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function save(array $fields)
    {
        return $this->model->create($fields);
    }

    public function update(int $id, array $fields)
    {
        return $this->model->find($id)->update($fields);
    }

    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
}
