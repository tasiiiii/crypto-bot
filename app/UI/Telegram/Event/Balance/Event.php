<?php

namespace CryptoBot\UI\Telegram\Event\Balance;

use CryptoBot\Infrastructure\Telegram\Event\EventInterface;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Update;

class Event implements EventInterface
{
    public function __construct(
        private readonly MessageBuilder $messageBuilder
    )
    {}

    public function getAlias(): string
    {
        return 'Баланс';
    }

    public function handle(int $chatId, Update $originalUpdate): void
    {
        $message = $this->messageBuilder->build();

        Telegram::sendMessage([
            'text'    => $message->getText(),
            'chat_id' => $chatId,
        ]);
    }
}
