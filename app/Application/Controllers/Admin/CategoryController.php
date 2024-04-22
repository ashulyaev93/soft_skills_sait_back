<?php

namespace App\Application\Controllers\Admin;

use App\Application\Services\CategoryService;
use App\Infrastructure\CategoryDto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function add(Request $request)
    {
        $dto = CategoryDto::fromRequest($request);
        $this->categoryService->addCategory($dto);

        return response()->json(['message' => 'Category add successfully'], 201);
    }

    public function update(Request $request)
    {
        $dto = CategoryDto::fromRequest($request);
        $this->categoryService->updateCategory($dto);

        return response()->json(['message' => 'Category updated successfully'], 201);
    }

    public function getById(Request $request)
    {

    }

    public function getAll()
    {
        return response()->json('Hello', 201);
    }

    public function delete()
    {
        return response()->json('Delete', 201);
    }
}
