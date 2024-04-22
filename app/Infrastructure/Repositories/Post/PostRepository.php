<?php

namespace App\Infrastructure\Repositories\Post;

use App\Domain\Post\Post;
use App\Application\Services\DatabaseConnect;

class PostRepository implements PostRepositoryInterface
{
    public function __construct()
    {

    }

    public function savePost(Post $post)
    {
        $postModel = new Post($post->getTitle(), $post->getContent(), $post->getCategoryId());

        $databaseConnect = new DatabaseConnect();
        $sqlPostRepository = new SqlPostRepository($databaseConnect);
        $sqlPostRepository->savePost($postModel);

        return $sqlPostRepository;
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
