<?php

namespace App\Repositories;

use App\Models\ContactPageContent;
use App\Repositories\Contracts\BaseRepository;

/**
 * @extends BaseRepository<ContactPageContent>
 */
class ContactPageContentRepository extends BaseRepository
{
    protected string $modelClass = ContactPageContent::class;
}
