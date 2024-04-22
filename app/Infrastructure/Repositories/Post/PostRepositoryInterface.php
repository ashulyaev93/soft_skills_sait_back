<?php

namespace App\Infrastructure\Repositories\Post;

use App\Domain\Post\Post;

interface PostRepositoryInterface
{
    public function savePost(Post $post);
    public function updatePost(Post $post);
    public function deletePost(Post $post);
    public function getAllPosts();
    public function getPostId();
}
