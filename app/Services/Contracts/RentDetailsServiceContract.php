<?php

namespace App\Services\Contracts;

interface RentDetailsServiceContract
{
    public function index();

    public function show(int $id);

    public function add(array $fields);

    public function remove(int $id);
}
