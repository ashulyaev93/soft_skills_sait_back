<?php

namespace App\Infrastructure;

use Illuminate\Http\Request;

class TagDto
{
    public string $title;

    public static function fromRequest(Request $request): self
    {
        $dto = new self();
        $dto->title = $request->input('title');

        return $dto;
    }
}
