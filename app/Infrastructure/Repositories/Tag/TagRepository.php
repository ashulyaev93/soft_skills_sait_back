<?php

namespace App\Infrastructure\Repositories\Tag;

use App\Domain\Post\Tag;
use App\Application\Services\DatabaseConnect;

class TagRepository implements TagRepositoryInterface
{
    public function __construct()
    {

    }

    public function saveTag(Tag $tag)
    {
        $categoryModel = new Tag($tag->getTitle());

        $databaseConnect = new DatabaseConnect();
        $sqlTagRepository = new SqlTagRepository($databaseConnect);
        $sqlTagRepository->saveTag($categoryModel);

        return $sqlTagRepository;
    }

    public function updateTag(Tag $tag)
    {
        // TODO: Implement updatePost() method.
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
