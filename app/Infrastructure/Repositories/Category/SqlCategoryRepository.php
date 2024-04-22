<?php

namespace App\Infrastructure\Repositories\Category;

use App\Application\Services\DatabaseConnect;
use App\Domain\Post\Category;

class SqlCategoryRepository implements CategoryRepositoryInterface
{
    private $connection;

    public function __construct(DatabaseConnect $databaseConnect)
    {
        $this->connection = $databaseConnect->getConnection();
    }

    public function saveCategory(Category $category): bool
    {
        try {
            $title = $category->getTitle();

            date_default_timezone_set('Europe/Moscow');
            $createdAt = date("Y-m-d H:i:s");
            $updatedAt = date("Y-m-d H:i:s");

            $stmt = $this->connection->prepare("INSERT INTO categories (title, created_at, updated_at) VALUES (?, ?, ?)");


            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $createdAt);
            $stmt->bindParam(3, $updatedAt);

            $this->connection->beginTransaction();

            $stmt->execute();

            $this->connection->commit();

            return true;
        } catch (\PDOException $e) {
            $this->connection->rollBack();

            error_log("Error while saving tag: " . $e->getMessage());

            return false;
        }
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
