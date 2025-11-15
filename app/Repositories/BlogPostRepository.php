<?php

namespace App\Repositories;

use App\Models\BlogPost;
use App\Repositories\Contracts\BaseRepository;

/**
 * @extends BaseRepository<BlogPost>
 */
class BlogPostRepository extends BaseRepository
{
    protected string $modelClass = BlogPost::class;
}
