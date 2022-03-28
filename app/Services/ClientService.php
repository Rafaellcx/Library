<?php

namespace App\Services;

use App\Http\Helpers\JsonFormat;
use App\Repositories\Contracts\ClientRepositoryContract;
use App\Services\Contracts\ClientServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class ClientService implements ClientServiceContract
{
    protected $clientRepository;

    /**
     * @param ClientRepositoryContract $clientRepository
     */
    public function __construct(ClientRepositoryContract $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        return $this->clientRepository->findAll();
    }

    public function show(int $id): JsonResponse
    {
        $client = $this->clientRepository->findById($id);
        if (!$client) {
            return JsonFormat::error('Client not found.');
        }

        return response()->json($client);
    }

    public function store(array $fields): JsonResponse
    {
        try {
            return $this->clientRepository->save($fields);
        } catch (Exception $exception) {
            return JsonFormat::error("Ops, Client not created.");
        }
    }

    public function update(int $id, array $fields)
    {
        return $this->clientRepository->update($id, $fields);
    }

    public function destroy(int $id)
    {
        return $this->clientRepository->delete($id);
    }
}
