<?php

namespace CryptoBot\Infrastructure\Telegram\Event;

use Telegram\Bot\Objects\Update;

interface EventInterface
{
    public function getAlias(): string;
    public function handle(int $chatId, Update $originalUpdate): void;
}
