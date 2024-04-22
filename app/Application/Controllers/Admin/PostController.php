<?php

namespace App\Application\Controllers\Admin;

use App\Application\Services\PostService;
use App\Infrastructure\PostDto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(Request $request)
    {
        $dto = PostDto::fromRequest($request);
        $this->postService->createPost($dto);

        return response()->json(['message' => 'Post created successfully'], 201);
    }

    public function update(Request $request)
    {
        $dto = PostDto::fromRequest($request);
        $this->postService->updatePost($dto);

        return response()->json(['message' => 'Post updated successfully'], 201);
    }

    public function getById(Request $request)
    {

    }

    public function getAll()
    {
        return response()->json('Hello', 201);
    }

    public function delete()
    {
        return response()->json('Delete', 201);
    }
}
