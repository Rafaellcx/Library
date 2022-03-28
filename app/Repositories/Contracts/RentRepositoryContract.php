<?php

namespace App\Repositories\Contracts;

interface RentRepositoryContract
{
    public function findAll();

    public function findById(int $id);

    public function save(array $fields);

    public function updateDevolutionDate(int $id, array $fields);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

    public function check(int $clientId);

    public function close(int $id);
}
