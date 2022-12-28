<?php

namespace CryptoBot\UI\Telegram\Command\Start;

use CryptoBot\Application\Common\MessageInterface;
use CryptoBot\UI\Telegram\ValueObject\TelegramMessage;

class MessageBuilder
{
    public function build(): MessageInterface
    {
        $message = "*Добро пожаловать в Onion Crypto Bot* ✨\n";
        $message .= "*Анонимный обменник* ❄️\n";
        $message .= "\n";
        $message .= "*Функционал* ⭐\n";
        $message .= "Автоматическое поступление и вывод\n";
        $message .= "Верификация KYC не нужна\n";
        $message .= "Доступные валюты: BTC, ETH, XMR, USDT\n";
        $message .= "Доступный фиат: RUB\n";
        $message .= "Система поиска объявлений";

        return new TelegramMessage($message);
    }
}
