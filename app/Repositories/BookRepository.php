<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Contracts\BookRepositoryContract;

class BookRepository implements BookRepositoryContract
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function save(array $fields): Book
    {
        return $this->model->create($fields);
    }

    public function update(int $id, array $fields)
    {
        return $this->model->find($id)->update($fields);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
