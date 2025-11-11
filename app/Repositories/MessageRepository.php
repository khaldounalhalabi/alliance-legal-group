<?php

namespace App\Repositories;

use App\Models\Message;
use App\Repositories\Contracts\BaseRepository;

/**
 * @extends  BaseRepository<Message>
 */
class MessageRepository extends BaseRepository
{
    protected string $modelClass = Message::class;
}
