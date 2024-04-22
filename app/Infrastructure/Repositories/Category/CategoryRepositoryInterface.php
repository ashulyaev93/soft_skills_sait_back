<?php

namespace App\Infrastructure\Repositories\Category;

use App\Domain\Post\Category;

interface CategoryRepositoryInterface
{
    public function saveCategory(Category $category);
    public function updateCategory(Category $category);
    public function deleteCategory(Category $category);
    public function getAllCategories();
    public function getCategoryId();
}
