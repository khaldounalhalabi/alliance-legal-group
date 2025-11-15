<?php

namespace App\Services\v1\BlogPost;

use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<BlogPost>
 * @property BlogPostRepository $repository
 */
class BlogPostService extends BaseService
{
    use Makable;

    protected string $repositoryClass = BlogPostRepository::class;
}
