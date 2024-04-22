<?php

namespace App\Infrastructure\Repositories\Tag;

use App\Application\Services\DatabaseConnect;
use App\Domain\Post\Tag;

class SqlTagRepository implements TagRepositoryInterface
{
    private $connection;

    public function __construct(DatabaseConnect $databaseConnect)
    {
        $this->connection = $databaseConnect->getConnection();
        if ($this->connection === null) {
            throw new \PDOException("Failed to connect to the database.");
        }
    }

    public function saveTag(Tag $tag): bool
    {
        try {
            $title = $tag->getTitle();

            date_default_timezone_set('Europe/Moscow');
            $createdAt = date("Y-m-d H:i:s");
            $updatedAt = date("Y-m-d H:i:s");

            $stmt = $this->connection->prepare("INSERT INTO tags (title, created_at, updated_at) VALUES (?, ?, ?)");


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

    public function updateTag(Tag $tag)
    {
        // TODO: Implement updateTag() method.
    }

    public function deleteTag(Tag $tag)
    {
        // TODO: Implement deleteTag() method.
    }

    public function getAllTags()
    {
        // TODO: Implement getAllTags() method.
    }

    public function getTagId()
    {
        // TODO: Implement getTagId() method.
    }
}
