<?php

namespace App\Repositories\Contracts;

interface RentDetailsRepositoryContract
{
    public function findAll();

    public function findById(int $id);

    public function save(array $fields);

    public function delete(int $id);

    public function checkBookAvailability(int $bookId, string $status);
}
