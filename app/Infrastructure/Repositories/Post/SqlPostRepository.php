<?php

namespace App\Infrastructure\Repositories\Post;

use App\Application\Services\DatabaseConnect;
use App\Domain\Post\Post;

class SqlPostRepository implements PostRepositoryInterface
{
    private $connection;

    public function __construct(DatabaseConnect $databaseConnect)
    {
        $this->connection = $databaseConnect->getConnection();
        if ($this->connection === null) {
            throw new \PDOException("Failed to connect to the database.");
        }
    }

    public function savePost(Post $post): bool
    {
        try {
            $title = $post->getTitle();
            $content = $post->getContent();
            $categoryId = $post->getCategoryId();

            date_default_timezone_set('Europe/Moscow');
            $createdAt = date("Y-m-d H:i:s");
            $updatedAt = date("Y-m-d H:i:s");

            $stmt = $this->connection->prepare("INSERT INTO posts (title, content, category_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");


            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $content);
            $stmt->bindParam(3, $categoryId);
            $stmt->bindParam(4, $createdAt);
            $stmt->bindParam(5, $updatedAt);

            $this->connection->beginTransaction();

            $stmt->execute();

            $this->connection->commit();

            return true;
        } catch (\PDOException $e) {
            $this->connection->rollBack();

            error_log("Error while saving post: " . $e->getMessage());

            return false;
        }
    }

    public function updatePost(Post $post)
    {
        // TODO: Implement updatePost() method.
    }

    public function deletePost(Post $post)
    {
        // TODO: Implement deletePost() method.
    }

    public function getAllPosts()
    {
        // TODO: Implement getAllPosts() method.
    }

    public function getPostId()
    {
        // TODO: Implement getPostId() method.
    }
}
