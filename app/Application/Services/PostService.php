<?php

namespace App\Application\Services;

use App\Domain\Post\Post;
use App\Infrastructure\PostDto;
use App\Infrastructure\Repositories\Post\PostRepository;

class PostService
{
    protected PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;

    }

    public function createPost(PostDto $postDto)
    {
        $post = new Post(
            $postDto->title,
            $postDto->content,
            $postDto->categoryId
        );

        $this->postRepository->savePost($post);
    }

    public function updatePost(PostDto $dto)
    {

    }
}
