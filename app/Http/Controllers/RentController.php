<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Http\Resources\RentResource;
use App\Services\Contracts\RentServiceContract;
use Illuminate\Http\JsonResponse;

class RentController extends Controller
{
    public $rentService;

    /**
     * @param RentServiceContract $rentService
     */
    public function __construct(RentServiceContract $rentService)
    {
        $this->rentService = $rentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */

    /**
     * List Rents
     * @OA\Get (
     *     path="/api/rent/all",
     *     tags={"Rent"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="devolution_date",
     *                         type="date",
     *                         example="2022-03-28"
     *                     ),
     *                     @OA\Property(
     *                         property="client_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="client_full_name",
     *                         type="string",
     *                         example="example full name"
     *                     ),
     *                     @OA\Property(
     *                         property="status",
     *                         type="string",
     *                         example="example: opened or closed"
     *                     ),
     *                     @OA\Property(
     *                         property="total_rent_price",
     *                         type="decimal",
     *                         example=15.65
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     ),
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return $this->rentService->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param StoreRentRequest $request
     * @return JsonResponse
     */

    /**
     * Create Rent
     * @OA\Post (
     *     path="/api/rent/store",
     *     tags={"Rent"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                     @OA\Property(
     *                         property="devolution_date",
     *                         type="date",
     *                         example="2022-03-28"
     *                     ),
     *                     @OA\Property(
     *                         property="client_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                 ),
     *                 example={
     *                     "devolution_date":"2022-03-28",
     *                     "client_id":1
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="devolution_date", type="date", example="2022-03-28"),
     *              @OA\Property(property="client_id", type="number", example=1),
     *              @OA\Property(property="client_full_name", type="string", example="Full name"),
     *              @OA\Property(property="status", type="string", example="opened"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */

    public function store(StoreRentRequest $request): JsonResponse
    {
        return $this->rentService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */

    /**
     * Get Rent Details
     * @OA\Get (
     *     path="/api/rent/find/{id}",
     *     tags={"Rent"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="devolution_date", type="date", example="2022-03-28"),
     *              @OA\Property(property="client_id", type="number", example=1),
     *              @OA\Property(property="client_full_name", type="string", example="Full name"),
     *              @OA\Property(property="status", type="string", example="opened"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found.",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Rent not found."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     * )
     */

    public function show(int $id): JsonResponse
    {
        return $this->rentService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param UpdateRentRequest $request
     * @return JsonResponse
     */

    /**
     * Update Rent
     * @OA\Put (
     *     path="/api/rent/update/{id}",
     *     tags={"Rent"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                     @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="devolution_date",
     *                         type="date",
     *                         example="2022-03-28"
     *                     )
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\Property(property="msg", type="string", example="true")
     *      )
     * )
     */
    public function update($id, UpdateRentRequest $request): JsonResponse
    {
        return $this->rentService->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */

    /**
     * Delete Rent
     * @OA\Delete (
     *     path="/api/rent/delete/{id}",
     *     tags={"Rent"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\Property(property="msg", type="string", example="true")
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found.",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Rent not found."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     * )
     * )
     */
    public function destroy($id): JsonResponse
    {
        return $this->rentService->destroy($id);
    }

    /**
     * Close Rent
     * @OA\Delete (
     *     path="/api/rent/close/{id}",
     *     tags={"Rent"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The rent is closed successfully."),
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Rent not found."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     * )
     */

    public function close($id): JsonResponse
    {
        return $this->rentService->close($id);
    }
}
