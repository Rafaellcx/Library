<?php

namespace App\Repositories;

use App\Models\RentDetails;
use App\Repositories\Contracts\RentDetailsRepositoryContract;

class RentDetailsRepository implements RentDetailsRepositoryContract
{
    protected $model;

    /**
     * @param RentDetails $model
     */
    public function __construct(RentDetails $model)
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

    public function delete(int $id)
    {
        return $this->model->where('id', $id)->forceDelete();
    }

    public function checkBookAvailability(int $bookId, string $status)
    {
        return $this->model->with('Rent')
            ->whereHas('Rent', function ($q) use ($status){
                $q->where('status', $status);
            })->where('book_id', $bookId)->first();
    }
}
