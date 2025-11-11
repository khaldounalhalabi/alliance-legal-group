<?php

namespace App\Services\v1\Message;

use App\Models\Message;
use App\Repositories\MessageRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;

/**
 * @extends BaseService<Message>
 * @property MessageRepository $repository
 */
class MessageService extends BaseService
{
    use Makable;

    protected string $repositoryClass = MessageRepository::class;
}
