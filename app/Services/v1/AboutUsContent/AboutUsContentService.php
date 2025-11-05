<?php

namespace App\Services\v1\AboutUsContent;

use App\Models\AboutUsContent;
use App\Repositories\AboutUsContentRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<AboutUsContent>
 *
 * @property AboutUsContentRepository $repository
 */
class AboutUsContentService extends BaseService
{
    use Makable;

    protected string $repositoryClass = AboutUsContentRepository::class;
}
