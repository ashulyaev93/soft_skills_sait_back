<?php

namespace App\Domain\Post;

/*
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
*/

class Post
{
    private $title;
    private $content;
    private $categoryId;

    public function __construct(string $title, string $content, int $categoryId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /*use HasFactory;

    protected $table = 'posts';
    protected $guarded = false;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->hasOne(Category::class);
    }*/
}

