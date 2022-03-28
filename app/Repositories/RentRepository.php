<?php

namespace App\Repositories;

use App\Models\Rent;
use App\Repositories\Contracts\RentRepositoryContract;

class RentRepository implements RentRepositoryContract
{
    protected $model;

    /**
     * @param Rent $model
     */
    public function __construct(Rent $model)
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

    public function updateDevolutionDate(int $id, array $fields)
    {
        return $this->model->where('id', $id)->update(['devolution_date' => $fields['devolution_date']]);
    }

    public function delete(int $id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * @param int $clientId
     * @return mixed
     */
    public function check(int $clientId)
    {
        return $this->model->where('client_id', $clientId)->where('status', 'opened')->first();
    }

    public function close(int $id)
    {
        return $this->model->where('id', $id)->update(['status' => 'closed']);
    }
}
