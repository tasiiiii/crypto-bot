<?php

namespace CryptoBot\UI\Telegram\Event\Balance;

use CryptoBot\Application\Common\MessageInterface;
use CryptoBot\UI\Telegram\ValueObject\TelegramMessage;

class MessageBuilder
{
    public function build(): MessageInterface
    {
        return new TelegramMessage('Ваш баланс');
    }
}
