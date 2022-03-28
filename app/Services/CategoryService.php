<?php

namespace App\Services;

use App\Http\Helpers\JsonFormat;
use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Services\Contracts\CategoryServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class CategoryService implements CategoryServiceContract
{

    protected $categoryRepository;

    /**
     * @param CategoryRepositoryContract $categoryRepository
     */
    public function __construct(CategoryRepositoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return $this->categoryRepository->findAll();
    }

    public function show(int $id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function store(array $fields): JsonResponse
    {
        try {
            return $this->categoryRepository->save($fields);
        } catch (Exception $exception) {
            return JsonFormat::error("Ops, Category not created.");
        }
    }

    public function update(int $id, array $fields)
    {
        return $this->categoryRepository->update($id, $fields);
    }

    public function destroy(int $id)
    {
        return $this->categoryRepository->delete($id);
    }
}
