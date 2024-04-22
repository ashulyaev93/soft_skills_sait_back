<?php

namespace App\Application\Services;

use App\Domain\Post\Category;
use App\Infrastructure\CategoryDto;
use App\Infrastructure\Repositories\Category\CategoryRepository;

class CategoryService
{
    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;

    }

    public function addCategory(CategoryDto $categoryDto)
    {
        $category = new Category(
            $categoryDto->title
        );

        $this->categoryRepository->saveCategory($category);
    }

    public function updateCategory(CategoryDto $dto)
    {

    }
}
