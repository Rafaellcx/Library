<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\Contracts\ClientServiceContract;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public $clientService;

    /**
     * @param ClientServiceContract $clientService
     */
    public function __construct(ClientServiceContract $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */

    /**
     * List Clients
     * @OA\Get (
     *     path="/api/client/all",
     *     tags={"Client"},
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
     *                         property="first_name",
     *                         type="string",
     *                         example="example first_name"
     *                     ),
     *                     @OA\Property(
     *                         property="last_name",
     *                         type="string",
     *                         example="example last_name"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="example email"
     *                     ),
     *                     @OA\Property(
     *                         property="birth",
     *                         type="date",
     *                         example="2022-03-28"
     *                     ),
     *                     @OA\Property(
     *                         property="document_number",
     *                         type="number",
     *                         example="1234567890"
     *                     ),
     *                     @OA\Property(
     *                         property="active",
     *                         type="bool",
     *                         example="true"
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
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json($this->clientService->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param StoreClientRequest $request
     * @return JsonResponse
     */

    /**
     * Create Client
     * @OA\Post (
     *     path="/api/client/store",
     *     tags={"Client"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                     @OA\Property(
     *                         property="first_name",
     *                         type="string",
     *                         example="example first name"
     *                     ),
     *                     @OA\Property(
     *                         property="last_name",
     *                         type="string",
     *                         example="example last name"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="example email"
     *                     ),
     *                     @OA\Property(
     *                         property="birth",
     *                         type="date",
     *                         example="2022-03-28"
     *                     ),
     *                     @OA\Property(
     *                         property="document_number",
     *                         type="string",
     *                         example=123456789
     *                     )
     *                 ),
     *                 example={
     *                     "first_name":"example first name",
     *                     "last_name":"example last name",
     *                     "email":"example email",
     *                     "birth":"2022-03-28",
     *                     "document_number":"1234567890"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="first_name", type="string", example="first name"),
     *              @OA\Property(property="last_name", type="string", example="last name"),
     *              @OA\Property(property="email", type="string", example="email"),
     *              @OA\Property(property="birth", type="date", example="2022-03-28"),
     *              @OA\Property(property="document_number", type="string", example="123456789"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *     @OA\Response(
     *          response=500,
     *          description="Exception",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Ops, Client not created."),
     *          )
     *      )
     * )
     */
    public function store(StoreClientRequest $request): JsonResponse
    {
        return response()->json($this->clientService->store($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */

    /**
     * Get Client Details
     * @OA\Get (
     *     path="/api/client/find/{id}",
     *     tags={"Client"},
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
     *              @OA\Property(property="first_name", type="string", example="first name"),
     *              @OA\Property(property="last_name", type="string", example="last name"),
     *              @OA\Property(property="email", type="string", example="email"),
     *              @OA\Property(property="birth", type="date", example="2022-03-28"),
     *              @OA\Property(property="document_number", type="string", example="123456789"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found.",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Client not found."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     * )
     */
    public function show(int $id): JsonResponse
    {
        return $this->clientService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param UpdateClientRequest $request
     * @return JsonResponse
     */

    /**
     * Update Client
     * @OA\Put (
     *     path="/api/client/update/{id}",
     *     tags={"Client"},
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
     *                 @OA\Property(
     *                      type="object",
     *                     @OA\Property(
     *                         property="first_name",
     *                         type="string",
     *                         example="example first name"
     *                     ),
     *                     @OA\Property(
     *                         property="last_name",
     *                         type="string",
     *                         example="example last name"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="example email"
     *                     ),
     *                     @OA\Property(
     *                         property="birth",
     *                         type="date",
     *                         example="2022-03-28"
     *                     ),
     *                     @OA\Property(
     *                         property="document_number",
     *                         type="string",
     *                         example=123456789
     *                     )
     *                 ),
     *                 example={
     *                     "first_name":"example first name",
     *                     "last_name":"example last name",
     *                     "email":"example email",
     *                     "birth":"2022-03-28",
     *                     "document_number":"1234567890"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\Property(property="msg", type="string", example="true")
     *          )
     *      )
     * )
     */
    public function update($id, UpdateClientRequest $request): JsonResponse
    {
        return response()->json($this->clientService->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */

    /**
     * Delete Client
     * @OA\Delete (
     *     path="/api/client/delete/{id}",
     *     tags={"Client"},
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
     *             @OA\Property(property="msg", type="string", example="true")
     *         )
     *     )
     * )
     */
    public function destroy($id): JsonResponse
    {
        return response()->json($this->clientService->destroy($id));
    }
}
