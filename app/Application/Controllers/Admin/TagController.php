<?php

namespace App\Application\Controllers\Admin;

use App\Application\Services\TagService;
use App\Infrastructure\TagDto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    protected TagService $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function add(Request $request)
    {
        $dto = TagDto::fromRequest($request);
        $this->tagService->addTag($dto);

        return response()->json(['message' => 'Tag add successfully'], 201);
    }

    public function update(Request $request)
    {
        $dto = TagDto::fromRequest($request);
        $this->tagService->updateTag($dto);

        return response()->json(['message' => 'Tag updated successfully'], 201);
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
