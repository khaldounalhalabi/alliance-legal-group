<?php

namespace App\Http\Controllers\WEB\v1;

use App\Http\Controllers\WebController;
use App\Http\Resources\v1\MessageResource;
use App\Services\v1\Message\MessageService;
use Inertia\Inertia;

class MessageController extends WebController
{
    private MessageService $messageService;

    public function __construct()
    {
        $this->messageService = MessageService::make();
        // place the relations you want to return them within the response
        $this->relations = [];
    }

    public function data()
    {
        $items = $this->messageService->indexWithPagination($this->relations);

        return rest()
            ->ok()
            ->getSuccess()
            ->data($items)
            ->send();
    }

    public function index()
    {
        return Inertia::render('dashboard/messages/index');
    }

    public function show($messageId)
    {
        $message = $this->messageService->view($messageId, $this->relations);

        return Inertia::render('dashboard/messages/show', [
            'message_record' => MessageResource::make($message),
        ]);
    }

    public function destroy($messageId)
    {
        $result = $this->messageService->delete($messageId);

        return rest()
            ->when(
                $result,
                fn($rest) => $rest->ok()->deleteSuccess(),
                fn($rest) => $rest->noData(),
            )->send();
    }
}
