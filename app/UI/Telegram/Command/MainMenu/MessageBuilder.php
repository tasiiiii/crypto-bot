<?php

namespace CryptoBot\UI\Telegram\Command\MainMenu;

use CryptoBot\Application\Common\MessageInterface;
use CryptoBot\UI\Telegram\ValueObject\TelegramMessage;

class MessageBuilder
{
    public function build(): MessageInterface
    {
        return new TelegramMessage('Вы можете выбрать действие в меню', [
            ['Баланс'],
            ['Пополнить', 'Вывод'],
            ['Поиск объявлений'],
            ['Мониторинг объявлений'],
            ['Создать объявление'],
        ]);
    }
}
