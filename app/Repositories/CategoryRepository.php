<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryContract;

class CategoryRepository implements CategoryRepositoryContract
{
    protected Category $model;

    /**
     * @param Category $model
     */
    public function __construct(Category $model)
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

    public function save($fields): Category
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
