<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryContract
{
    public function findAll();

    public function findById(int $id);

    public function save(array $fields);

    public function update(int $id, array $fields);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}
