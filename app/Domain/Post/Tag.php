<?php

namespace App\Domain\Post;

/*
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
*/

class Tag
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /*use HasFactory;

    protected $table = 'tags';
    protected $guarded = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }*/
}
