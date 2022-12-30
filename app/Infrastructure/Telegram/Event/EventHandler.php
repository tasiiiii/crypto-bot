<?php

namespace CryptoBot\Infrastructure\Telegram\Event;

use Illuminate\Support\Facades\App;
use Telegram\Bot\Objects\Update;

class EventHandler
{
    public static function tryHandle(Update $update): void
    {
        $eventRepository = new EventRepository();

        $alias = $update->getMessage()->get('text');
        if (!is_string($alias)) {
            return;
        }

        $event = $eventRepository->getByAlias(trim($alias));
        if (!$event) {
            return;
        }

        $chatId = $update->getChat()->get('id');
        if (!is_int($chatId)) {
            return;
        }

        $event->handle($chatId, $update);
    }
}
