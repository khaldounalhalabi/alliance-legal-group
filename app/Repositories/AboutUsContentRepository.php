<?php

namespace App\Repositories;

use App\Models\AboutUsContent;
use App\Repositories\Contracts\BaseRepository;

/**
 * @extends  BaseRepository<AboutUsContent>
 */
class AboutUsContentRepository extends BaseRepository
{
    protected string $modelClass = AboutUsContent::class;
}
