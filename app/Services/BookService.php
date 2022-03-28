<?php

namespace App\Services;

use App\Http\Helpers\JsonFormat;
use App\Repositories\Contracts\BookRepositoryContract;
use App\Services\Contracts\BookServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class BookService implements BookServiceContract
{

    protected $bookRepository;

    public function __construct(BookRepositoryContract $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        return $this->bookRepository->findAll();
    }

    public function show(int $id): JsonResponse
    {
        $book = $this->bookRepository->findById($id);
        if (!$book) {
            return JsonFormat::error('Book not found.');
        }

        return response()->json($book);
    }

    public function store(array $fields): JsonResponse
    {
        try {
            return $this->bookRepository->save($fields);
        } catch (Exception $exception) {
            return JsonFormat::error("Ops, Book not created.");
        }
    }

    public function update(int $id, array $fields)
    {
        return $this->bookRepository->update($id, $fields);
    }

    public function destroy(int $id)
    {
        return $this->bookRepository->delete($id);
    }
}
