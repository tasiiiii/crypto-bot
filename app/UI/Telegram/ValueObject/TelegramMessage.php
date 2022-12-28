<?php

namespace CryptoBot\UI\Telegram\ValueObject;

use CryptoBot\Application\Common\MessageInterface;

class TelegramMessage implements MessageInterface
{
    public function __construct(
        private readonly string $text = '',
        private readonly array  $keyboard = []
    )
    {}

    public function getText(): string
    {
        return $this->text;
    }

    public function getKeyboard(): array
    {
        return $this->keyboard;
    }
}
