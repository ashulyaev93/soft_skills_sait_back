<?php

namespace App\Infrastructure\Repositories\Category;

use App\Domain\Post\Category;
use App\Application\Services\DatabaseConnect;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct()
    {

    }

    public function saveCategory(Category $category)
    {
        $categoryModel = new Category($category->getTitle());

        $databaseConnect = new DatabaseConnect();
        $sqlCategoryRepository = new SqlCategoryRepository($databaseConnect);
        $sqlCategoryRepository->saveCategory($categoryModel);

        return $sqlCategoryRepository;
    }

    public function updateCategory(Category $category)
    {
        // TODO: Implement updateCategory() method.
    }

    public function deleteCategory(Category $category)
    {
        // TODO: Implement deleteCategory() method.
    }

    public function getAllCategories()
    {
        // TODO: Implement getAllCategories() method.
    }

    public function getCategoryId()
    {
        // TODO: Implement getCategoryId() method.
    }
}
