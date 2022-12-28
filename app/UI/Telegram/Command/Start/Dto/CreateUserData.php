<?php

namespace CryptoBot\UI\Telegram\Command\Start\Dto;

use CryptoBot\Application\User\Contract\CreateUserDataInterface;

class CreateUserData implements CreateUserDataInterface
{
    private string $telegramUserId;

    public function getTelegramUserId(): string
    {
        return $this->telegramUserId;
    }

    public function setTelegramUserId(string $telegramUserId): self
    {
        $this->telegramUserId = $telegramUserId;

        return $this;
    }
}
