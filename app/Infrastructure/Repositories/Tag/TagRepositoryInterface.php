<?php

namespace App\Infrastructure\Repositories\Tag;

use App\Domain\Post\Tag;

interface TagRepositoryInterface
{
    public function saveTag(Tag $tag);
    public function updateTag(Tag $tag);
    public function deleteTag(Tag $tag);
    public function getAllTags();
    public function getTagId();
}
