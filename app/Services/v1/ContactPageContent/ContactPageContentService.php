<?php

namespace App\Services\v1\ContactPageContent;

use App\Models\ContactPageContent;
use App\Repositories\ContactPageContentRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<ContactPageContent>
 *
 * @property ContactPageContentRepository $repository
 */
class ContactPageContentService extends BaseService
{
    use Makable;

    protected string $repositoryClass = ContactPageContentRepository::class;
}
