<?php

namespace CryptoBot\UI\Telegram\Command\Start;

use CryptoBot\Application\User\Action\CreateUserAction;
use CryptoBot\UI\Telegram\Command\Start\Dto\CreateUserData;
use Telegram\Bot\Commands\Command as BaseCommand;

class Command extends BaseCommand
{
    protected $name = 'start';
    protected $description = 'Start Onion Crypto Bot';

    public function __construct(
        private readonly CreateUserAction $createUserAction,
        private readonly MessageBuilder   $messageBuilder
    )
    {}

    public function handle(): void
    {
        $message = $this->messageBuilder->build();

        $this->replyWithMessage(['text' => $message->getText(), 'parse_mode' => 'markdown']);

        $this->triggerCommand('main');

        $telegramUserId = $this->getUpdate()->getMessage()->get('from')->get('id');
        $createUerData  = (new CreateUserData())->setTelegramUserId($telegramUserId);

        $this->createUserAction->run($createUerData);
    }
}
