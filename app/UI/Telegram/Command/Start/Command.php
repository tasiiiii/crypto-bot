<?php

namespace CryptoBot\UI\Telegram\Command\Start;

use Telegram\Bot\Commands\Command as BaseCommand;

class Command extends BaseCommand
{
    protected $name = 'start';
    protected $description = 'Start Onion Crypto Bot';

    public function __construct(
        private readonly MessageBuilder $messageBuilder
    )
    {}

    public function handle(): void
    {
        $message = $this->messageBuilder->build();

        $this->replyWithMessage(['text' => $message->getText(), 'parse_mode' => 'markdown']);

        $this->triggerCommand('main');
    }
}
