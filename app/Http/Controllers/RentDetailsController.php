<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentDetailsRequest;
use App\Http\Requests\UpdateRentDetailsRequest;
use App\Models\RentDetails;
use App\Services\Contracts\RentDetailsServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RentDetailsController extends Controller
{
    public $rentDetails;

    /**
     * @param RentDetailsServiceContract $rentDetails
     */
    public function __construct(RentDetailsServiceContract $rentDetails)
    {
        $this->rentDetails = $rentDetails;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */

    /**
     * List Rent Details
     * @OA\Get (
     *     path="/api/rent_detail/all",
     *     tags={"Rent Details"},
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
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="rent_id",
     *                         type="number",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="rent_status",
     *                         type="string",
     *                         example="example: opened or closed"
     *                     ),
     *                     @OA\Property(
     *                         property="book_id",
     *                         type="number",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="book_title",
     *                         type="string",
     *                         example="example book_title"
     *                     ),
     *                     @OA\Property(
     *                         property="book_price",
     *                         type="decimal",
     *                         example=15.95
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
        return $this->rentDetails->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRentDetailsRequest $request
     * @return JsonResponse
     */

    /**
     * Add Rent Details
     * @OA\Post (
     *     path="/api/rent_detail/store",
     *     tags={"Rent Details"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                     @OA\Property(
     *                         property="book_id",
     *                         type="number",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="rent_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                 ),
     *                 example={
     *                     "book_id":78,
     *                     "rent_id":50
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=46),
     *              @OA\Property(property="rent_id", type="number", example=50),
     *              @OA\Property(property="rent_status", type="string", example="opened"),
     *              @OA\Property(property="book_id", type="number", example=78),
     *              @OA\Property(property="book_title", type="string", example="hy in Niue - I"),
     *              @OA\Property(property="book_price", type="decimal", example=372.68),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="The informed book already rent."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Ops, Rent detail was not created."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      )
     * )
     */

    public function store(StoreRentDetailsRequest $request): JsonResponse
    {
        return $this->rentDetails->add($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */

    /**
     * Get Rent Details
     * @OA\Get (
     *     path="/api/rent_detail/find/{id}",
     *     tags={"Rent Details"},
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
     *              @OA\Property(property="rent_id", type="number", example=1),
     *              @OA\Property(property="book_id", type="number", example=1),
     *              @OA\Property(property="book_title", type="string", example="example book title"),
     *              @OA\Property(property="book_price", type="string", example="example book price"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *         )
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        return $this->rentDetails->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */

    /**
     * Remove Rent Details
     * @OA\Delete (
     *     path="/api/rent_details/delete/{id}",
     *     tags={"Rent Details"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Rent detail not found."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Does not allow deleting a book from an already closed rental.",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Rent detail was success deleted."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        return $this->rentDetails->remove($id);
    }

}
