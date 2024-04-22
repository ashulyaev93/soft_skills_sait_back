<?php

namespace App\Infrastructure;

use Illuminate\Http\Request;

class PostDto
{
    public string $title;
    public string $content;
    public int $categoryId;

    public static function fromRequest(Request $request): self
    {
        $dto = new self();
        $dto->title = $request->input('title');
        $dto->content = $request->input('content');
        $dto->categoryId = $request->input('categoryId');

        return $dto;
    }
}
