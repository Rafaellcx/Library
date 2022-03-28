<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\Contracts\BookServiceContract;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public $bookService;

    public function __construct(BookServiceContract $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */

    /**
     * List Categories
     * @OA\Get (
     *     path="/api/book/all",
     *     tags={"Book"},
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
     *                         property="title",
     *                         type="string",
     *                         example="example title"
     *                     ),
     *                     @OA\Property(
     *                         property="author",
     *                         type="string",
     *                         example="example author"
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string",
     *                         example="example description"
     *                     ),
     *                     @OA\Property(
     *                         property="year_edition",
     *                         type="number",
     *                         example="2022"
     *                     ),
     *                     @OA\Property(
     *                         property="price",
     *                         type="decimal",
     *                         example="50.48"
     *                     ),
     *                     @OA\Property(
     *                         property="category_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
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
        return response()->json($this->bookService->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookRequest $request
     * @return JsonResponse
     */

    /**
     * Create Book
     * @OA\Post (
     *     path="/api/book/store",
     *     tags={"Book"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         example="example title"
     *                     ),
     *                     @OA\Property(
     *                         property="author",
     *                         type="string",
     *                         example="example author"
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string",
     *                         example="example description"
     *                     ),
     *                     @OA\Property(
     *                         property="year_edition",
     *                         type="number",
     *                         example="2022"
     *                     ),
     *                     @OA\Property(
     *                         property="price",
     *                         type="decimal",
     *                         example="50.48"
     *                     ),
     *                     @OA\Property(
     *                         property="category_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                 ),
     *                 example={
     *                     "title":"example title",
     *                     "author":"example author",
     *                     "description":"example description",
     *                     "year_edition":"2022",
     *                     "price":"50.48",
     *                     "category_id":1,
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="author", type="string", example="author"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="year_edition", type="number", example=2022),
     *              @OA\Property(property="price", type="float", example=15.85),
     *              @OA\Property(property="category_id", type="number", example=1),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Exception",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Ops, Book not created."),
     *          )
     *      )
     * )
     */

    public function store(StoreBookRequest $request): JsonResponse
    {
        return $this->bookService->store($request->all());

    }
    /**
     * Get Book Details
     * @OA\Get (
     *     path="/api/book/find/{id}",
     *     tags={"Book"},
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
     *              @OA\Property(property="author", type="string", example="author"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="year_edition", type="number", example=2022),
     *              @OA\Property(property="price", type="float", example=15.85),
     *              @OA\Property(property="category_id", type="number", example=1),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *         ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found.",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Book not found."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     *     )
     * )
     */

    public function show($id): JsonResponse
    {
        return $this->bookService->show($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param UpdateBookRequest $request
     * @return JsonResponse
     */

    /**
     * Update Book
     * @OA\Put (
     *     path="/api/book/update/{id}",
     *     tags={"Book"},
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
     *                         property="title",
     *                         type="string",
     *                         example="example title"
     *                     ),
     *                     @OA\Property(
     *                         property="author",
     *                         type="string",
     *                         example="example author"
     *                     ),
     *                     @OA\Property(
     *                         property="description",
     *                         type="string",
     *                         example="example description"
     *                     ),
     *                     @OA\Property(
     *                         property="year_edition",
     *                         type="number",
     *                         example="2022"
     *                     ),
     *                     @OA\Property(
     *                         property="price",
     *                         type="decimal",
     *                         example="50.48"
     *                     ),
     *                     @OA\Property(
     *                         property="category_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                 ),
     *                 example={
     *                     "title":"example title",
     *                     "author":"example author",
     *                     "description":"example description",
     *                     "year_edition":"2022",
     *                     "price":"50.48",
     *                     "category_id":1,
     *                }
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
    public function update($id, UpdateBookRequest $request): JsonResponse
    {
        return response()->json($this->bookService->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */

    /**
     * Delete Book
     * @OA\Delete (
     *     path="/api/book/delete/{id}",
     *     tags={"Book"},
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
     *     )
     * )
     */
    public function destroy($id): JsonResponse
    {
        return response()->json($this->bookService->destroy($id));
    }
}
