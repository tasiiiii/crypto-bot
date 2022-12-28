<?php

namespace CryptoBot\UI\Telegram\Command\MainMenu;

use Telegram\Bot\Commands\Command as BaseCommand;
use Telegram\Bot\Keyboard\Keyboard;

class Command extends BaseCommand
{
    protected $name = 'main';
    protected $description = 'Главное меню';

    public function __construct(
        private readonly MessageBuilder $messageBuilder
    )
    {}

    public function handle()
    {
        $message = $this->messageBuilder->build();

        $replyMarkup = Keyboard::make([
            'keyboard'        => $message->getKeyboard(),
            'resize_keyboard' => true,
        ]);

        $this->replyWithMessage(['text' => $message->getText(), 'reply_markup' => $replyMarkup]);
    }
}
