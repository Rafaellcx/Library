<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\Contracts\CategoryServiceContract;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public $categoryService;

    public function __construct(CategoryServiceContract $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * List Categories
     * @OA\Get (
     *     path="/api/category/all",
     *     tags={"Category"},
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
     *                         property="name",
     *                         type="string",
     *                         example="example name"
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
        return response()->json($this->categoryService->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return JsonResponse
     */

    /**
     * Create Category
     * @OA\Post (
     *     path="/api/category/store",
     *     tags={"Category"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"example category name"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="exception",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Ops, Category not created."),
     *          )
     *      )
     * )
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return response()->json($this->categoryService->store($request->all()));
    }

    /**
     * @param $id
     * @return JsonResponse
     */

    /**
     * Get Category Details
     * @OA\Get (
     *     path="/api/category/find/{id}",
     *     tags={"Category"},
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
     *              @OA\Property(property="name", type="string", example="name"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found.",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="failed"),
     *              @OA\Property(property="message", type="string", example="Catagory not found."),
     *              @OA\Property(property="data", type="string", example="[]"),
     *          )
     *      ),
     * )
     */
    public function show($id): JsonResponse
    {
        return response()->json($this->categoryService->show($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param UpdateCategoryRequest $request
     * @return JsonResponse
     */
    /**
     * Update Category
     * @OA\Put (
     *     path="/api/category/update/{id}",
     *     tags={"Category"},
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
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"example category name"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="example category name"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCategoryRequest $request): JsonResponse
    {
        return response()->json($this->categoryService->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */

    /**
     * Delete Category
     * @OA\Delete (
     *     path="/api/category/delete/{id}",
     *     tags={"Category"},
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
        return response()->json($this->categoryService->destroy($id));
    }
}
