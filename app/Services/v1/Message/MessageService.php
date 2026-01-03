<?php

namespace App\Services\v1\Message;

use App\Mail\NewMessageMail;
use App\Models\Message;
use App\Repositories\MessageRepository;
use App\Services\Contracts\BaseService;
use App\Traits\Makable;
use Illuminate\Support\Facades\Mail;

/**
 * @extends BaseService<Message>
 *
 * @property MessageRepository $repository
 */
class MessageService extends BaseService
{
    use Makable;

    protected string $repositoryClass = MessageRepository::class;

    public function store(array $data, array $relationships = []): Message
    {
        $message = $this->repository->create($data, $relationships);
        Mail::to(config('settings.messages_mailed_to'))
            ->send(new NewMessageMail($message));

        return $message;
    }
}
