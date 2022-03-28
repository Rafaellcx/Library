<?php

namespace App\Services;

use App\Http\Helpers\JsonFormat;
use App\Http\Resources\RentResource;
use App\Repositories\Contracts\RentRepositoryContract;
use App\Services\Contracts\RentServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class RentService implements RentServiceContract
{
    protected $rentRepository;

    /**
     * @param RentRepositoryContract $rentRepository
     */
    public function __construct(RentRepositoryContract $rentRepository)
    {
        $this->rentRepository = $rentRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json(RentResource::collection($this->rentRepository->findAll(), 200));
    }

    public function show(int $id): JsonResponse
    {
        $rent = $this->rentRepository->findById($id);

        if (!$rent) {
            return JsonFormat::error('Rent not found.');
        }

        return response()->json(new RentResource($rent), 200);
    }

    public function store(array $fields): JsonResponse
    {
        /**
         * Check if already exists rent for client in opened.
         */
        $rent = $this->rentRepository->check($fields['client_id']);

        if ($rent) {
            return JsonFormat::error('Already exists a opened in rent for this client.');
        }

        /**
         * Create a new rental.
         */
        try {
            $this->rentRepository->save($fields);
        } catch (Exception $ex) {
            return JsonFormat::error('Ops, Rental was not created.');
        }
        return JsonFormat::success('Rent was granted successfully.', [], 201);
    }

    public function update(int $id, array $fields): JsonResponse
    {
        $rent = $this->rentRepository->updateDevolutionDate($id, $fields);

        if (!$rent) {
            return JsonFormat::error('Rent not found.');
        }

        return response()->json($rent);
    }

    public function destroy(int $id): JsonResponse
    {
        $rent = $this->rentRepository->delete($id);

        if (!$rent) {
            return JsonFormat::error('Rent not found.');
        }

        return response()->json($rent);
    }

    public function close(int $id): JsonResponse
    {
        $rent = $this->rentRepository->close($id);

        if (!$rent) {
            return JsonFormat::error('Rent not found.');
        }

        return JsonFormat::success('The rent is closed successfully.');
    }
}
