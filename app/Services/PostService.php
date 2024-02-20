<?php

namespace App\Services;


use App\Models\Post;

class PostService
{

    public function index()
    {
        return Post::paginate(10);
    }


}
