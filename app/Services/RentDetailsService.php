<?php

namespace App\Services;

use App\Http\Helpers\JsonFormat;
use App\Http\Resources\RentDetailsResource;
use App\Repositories\Contracts\RentDetailsRepositoryContract;
use App\Services\Contracts\RentDetailsServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class RentDetailsService implements RentDetailsServiceContract
{
    protected $rentDetails;
    protected $rent;

    /**
     * @param RentDetailsRepositoryContract $rentDetails
     */
    public function __construct(
        RentDetailsRepositoryContract $rentDetails)
    {
        $this->rentDetails = $rentDetails;
    }

    public function index(): JsonResponse
    {
        $rentDetails =  $this->rentDetails->findAll();

        if ($rentDetails) {
            return response()->json(RentDetailsResource::collection($rentDetails));
        }

        return response()->json($rentDetails);
    }

    public function show(int $id): JsonResponse
    {
        $rentDetails = $this->rentDetails->findById($id);

        if (!$rentDetails) {
            return JsonFormat::error('Rent detail not found.');
        }

        return response()->json(new RentDetailsResource($rentDetails));
    }

    public function add(array $fields): JsonResponse
    {
        /**
         * Check if book is available.
         */
        $check = $this->rentDetails->checkBookAvailability($fields['book_id'], 'opened');

        /**
         * If book is rented.
         */
        if ($check != null) {
            return JsonFormat::error('The informed book already rent.', [],404);
        }

        /**
         * If book is available, add to rent.
         */
        try {
            $rentDetails = $this->rentDetails->save($fields);
            return response()->json(new RentDetailsResource($rentDetails));
        } catch (Exception $ex) {
            return JsonFormat::error('Ops, Rent detail was not created.');
        }
    }

    public function remove(int $id): JsonResponse
    {
        /**
         * Get rent details
         */
        $rentDetails = $this->rentDetails->findById($id);

        if (!$rentDetails) {
            return JsonFormat::error('Rent detail not found.');
        }

        /**
         * Does not allow deleting a book from an already closed rental.
         */
        if ($rentDetails->rent_status == 'closed') {
            return JsonFormat::error('Rent already closed.');
        }

        $rentDetails = $this->rentDetails->delete($id);

        if (!$rentDetails) {
            return JsonFormat::error('Rent detail not found.');
        }

        return JsonFormat::success('Rent detail was success deleted.');
    }
}
