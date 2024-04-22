<?php

namespace App\Application\Services;

use App\Domain\Post\Tag;
use App\Infrastructure\TagDto;
use App\Infrastructure\Repositories\Tag\TagRepository;

class TagService
{
    protected TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;

    }

    public function addTag(TagDto $tagDto)
    {
        $tag = new Tag(
            $tagDto->title
        );

        $this->tagRepository->saveTag($tag);
    }

    public function updateTag(TagDto $dto)
    {

    }
}
